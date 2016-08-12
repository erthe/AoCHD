<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class Demo_IndexController extends Zend_Controller_Action {
	public $model;

	public function init() {
		$root_dir = dirname(dirname(dirname(__FILE__))) . '/';
		require_once ($root_dir . 'default/models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}

	public function datepickerAction() {
		$this->view->title = 'DatePickerDefault';
    }
    
	public function oredatetimeAction() {
		$this->view->title = 'DatePickerCustom';
	}
	
	public function datesendAction() {
        $params = $this->getRequest()->getParams();
        var_dump($params);
    }

    public function agreementAction() {
        $is_smp = $this->smpcheck();
        if($is_smp == true) {
            $smp = 1;
        } else {
            $smp = 0;
        }

        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';

        if (file_exists($write_path.'signature.png') ) {
            // pdf exist check
            if(file_exists('agreement.pdfg')) {
                // if pdf exist, print pdf
                $this->view->ispdf = 2;

                $filename = $write_path. "agreement.pdf";
                $imagename = $writepath . "signature.png";
                $fp=fopen($write_path . '/' . $filename, "w");
                fwrite($fp, $pdf);
                fclose($fp);

                $im = new imagick();
                $im->setResolution(144,144);
                $im->readimage($write_path. '/'  . $filename);
                $im->setImageFormat('png');
                $im->writeImage($write_path. '/' . $imagename);
                $im->clear();
                $im->destroy();

                // separate disposal by smart_phone or PC
                if ($is_smp) {
                    $this->view->issmp = $smp;
                    $this->view->jpg = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path. '/' . $imagename));
                } else {
                    header('Content-Disposition: attachment; filename="'.$file_name.'"');
                    $this->view->file_type = 'pdf';
                    mb_convert_encoding(readfile($this->url, false, $context2), "SJIS", "UTF-8");
                }
                $this->view->title = '書類表示';

                unlink($write_path.'/'.$filename);
                unlink($write_path.'/'.$imagename);

            } else {
                // if pdf does not exist, print signature
                $signature = $_SESSION['abroad'].'signature.png';
                $image = getimage($_SESSION['abroad'], $signature, $this->url, $this->pass);

                $this->view->signature = 'data:image/png;base64,' . $image;
                $this->view->agreement_date = $agreement[0]['agreement_date'];
                $this->view->ispdf = 1;
            }

        } else {
            $this->view->signature = null;
            $this->view->agreement_date = null;
            $this->view->ispdf = 0;
            $tokenHandler = new Custom_Auth_Token;
            $this->view->token = $tokenHandler->getToken('agreement');
        }

        $this->view->title = '同意書表示';
        $this->view->issmp = $smp;
        $this->view->agreement = $agreement[0]['agreement_flag'];
    }

    public function savesignatureAction() {
        $params = $this->getRequest ()->getParams ();

        $table = 'clientstatus';
        $agreement = 'agreement';
        $param = 1;
        $article = 'article';

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'errorcsrf', 'index', 'error' );
        }

        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/img';
        $json = $params['output'];
        $img = sigJsonToImage($json);
        $comment = 'お客様署名';

        imagepng($img, $write_path.'/'.$_SESSION['abroad'].'signature.png');
        imagedestroy($img);

        $signature = $_SESSION['abroad'].'signature.png';
        $comment = 'お客様署名';
        $file_class = 91;
        $ret = setimage($_SESSION['abroad'], $signature, $comment, $file_class, $this->url, $this->pass);
        $this->model->setStatus($table, $_SESSION['abroad'], $article, $param);
        $this->model->setStatus($table, $_SESSION['abroad'], $agreement, $param);
        $agreement = $this->model->getStatus($table, $_SESSION['abroad'], $agreement);

        // make pdf for keeping
        $html = file_get_contents($this->base.'/mypage/application/agreement?abroad='.$_SESSION['abroad']);
        $mpdf = new mPDF('ja', 'A4');
        $mpdf->WriteHTML($html);
        $mpdf->Output($write_path. '/' . $_SESSION['abroad'] . 'agreement.pdf', 'F');

        $agreement = $_SESSION['abroad'].'agreement.pdf';
        $comment2 = '同意書内容';
        $file_class2 = 92;
        $ret2 = setimage($_SESSION['abroad'], $agreement, $comment, $file_class2, $this->url, $this->pass);

        unlink($write_path.'/'.$_SESSION['abroad'].'signature.png');
        unlink($write_path.'/'.$_SESSION['abroad'].'agreement.pdf');
    }	

    private function smpcheck() {
        $detect = new Mobile_Detect;
        $ua = $detect->isMobile();
        return $ua;
    }
}

<?php
/*
 * Imagerotate replacement. ignore_transparent is work for png images
 * Also, have some standard functions for 90, 180 and 270 degrees.
 * Rotation is clockwise.
 */

final class ImageRotator {

	private static function rotatex($x, $y, $theta) {
		return $x * cos($theta) - $y * sin($theta);
	}

	private static function rotateY($x, $y, $theta) {
		return $x * sin($theta) + $y * cos($theta);
	}

	public static function imagerotate($srcImg, $angle, $bgcolor, $ignore_transparent = 0) {

		$srcw = imagesx($srcImg);
		$srch = imagesy($srcImg);

		// Normalize angle
		$angle %= 360;
		// Set rotate to clockwise
		$angle = -$angle;

		if ($angle == 0) {
			if ($ignore_transparent == 0) {
				imagesavealpha($srcImg, true);
			}
			return $srcImg;
		}

		// Convert the angle to radians
		$theta = deg2rad($angle);

		// Standart case of rotate
		if ((abs($angle) == 90) || (abs($angle) == 270)) {
			$width = $srch;
			$height = $srcw;
			if (($angle == 90) || ($angle == -270)) {
				$minX = 0;
				$maxX = $width;
				$minY = -$height + 1;
				$maxY = 1;
			} else if (($angle == -90) || ($angle == 270)) {
				$minX = -$width + 1;
				$maxX = 1;
				$minY = 0;
				$maxY = $height;
			}
		} else if (abs($angle) === 180) {
			$width = $srcw;
			$height = $srch;
			$minX = -$width + 1;
			$maxX = 1;
			$minY = -$height + 1;
			$maxY = 1;
		} else {
			// Calculate the width of the destination image.
			$temp = array(
				self::rotateX(0, 0, 0 - $theta),
				self::rotateX($srcw, 0, 0 - $theta),
				self::rotateX(0, $srch, 0 - $theta),
				self::rotateX($srcw, $srch, 0 - $theta)
			);
			$minX = floor(min($temp));
			$maxX = ceil(max($temp));
			$width = $maxX - $minX;

			// Calculate the height of the destination image.
			$temp = array(
				self::rotateY(0, 0, 0 - $theta),
				self::rotateY($srcw, 0, 0 - $theta),
				self::rotateY(0, $srch, 0 - $theta),
				self::rotateY($srcw, $srch, 0 - $theta)
			);
			$minY = floor(min($temp));
			$maxY = ceil(max($temp));
			$height = $maxY - $minY;
		}

		$destimg = imagecreatetruecolor($width, $height);
		if ($ignore_transparent == 0) {
			imagefill($destimg, 0, 0, imagecolorallocatealpha($destimg, 255,255, 255, 127));
			imagesavealpha($destimg, true);
		}

		// sets all pixels in the new image
		for($x = $minX; $x < $maxX; $x++) {
			for($y = $minY; $y < $maxY; $y++) {
				// fetch corresponding pixel from the source image
				$srcX = round(self::rotateX($x, $y, $theta));
				$srcY = round(self::rotateY($x, $y, $theta));
				if($srcX >= 0 && $srcX < $srcw && $srcY >= 0 && $srcY < $srch) {
					$color = imagecolorat($srcImg, $srcX, $srcY );
				} else {
					$color = $bgcolor;
				}
				imagesetpixel($destimg, $x - $minX, $y - $minY, $color);
			}
		}
		return $destimg;
	}
}
?>
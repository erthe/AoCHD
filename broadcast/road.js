var fs = require("fs");
var server = require("http").createServer(function(req, res) {
     res.writeHead(200, {"Content-Type":"text/html"});
     var output = fs.readFileSync("./road.html", "utf-8");
     res.end(output);
}).listen(3002);
var io = require("socket.io").listen(server);

// ユーザ管理ハッシュ
var userHash = {};
var viewer = 0;

// 2.イベントの定義
io.sockets.on("connection", function (socket) {

  // 接続開始カスタムイベント(接続元ユーザを保存し、他ユーザへ通知)
  socket.on("connected", function (name) {
    var msg = name + "が入室しました";
    userHash[socket.id] = name;
    io.sockets.emit("login", {value: msg});
  });

  socket.on("calc", function() {
    viewer = viewer + 1;
    io.sockets.emit("calc", {value: viewer});
  });

  socket.on("view", function() {
    io.sockets.emit("viewer", {value: viewer});
  });

  // メッセージ送信カスタムイベント
  socket.on("publish", function (data) {
    var msg = [data.value, userHash[socket.id]];
    io.sockets.emit("publish", {value: msg});
  });

  // 接続終了組み込みイベント(接続元ユーザを削除し、他ユーザへ通知)
   socket.on("disconnect", function () {
    if (userHash[socket.id]) {
      var msg = userHash[socket.id] + "が退出しました";
      delete userHash[socket.id];
      io.sockets.emit("logout", {value: msg});
    }
    viewer = viewer - 1;
    io.sockets.emit("viewer", {value: viewer});
  });
});
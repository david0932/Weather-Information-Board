
var util = require("util"),
    http = require("http");

var options = {
    host: "www.caija.url.tw",
    port: 80,
    path: "/"
};

var content = "";   

var req = http.request(options, function(res) {
    res.setEncoding("utf8");
    res.on("data", function (chunk) {
        content += chunk;
    });

    res.on("end", function () {
        util.log(content);
    });
});

req.end();
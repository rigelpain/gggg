document.getElementById("copy-page").onclick = function () {
    $(document.body).append(
        '<textarea id="copyTarget" style="position:absolute; left:-9999px; top:0px;" readonly="readonly">' +
            location.href +
            "</textarea>"
    );
    let obj = document.getElementById("copyTarget");
    let range = document.createRange();
    range.selectNode(obj);
    window.getSelection().addRange(range);
    document.execCommand("copy");
    alert("リンクをコピーしたよ！みんなにシェアしてね");
};

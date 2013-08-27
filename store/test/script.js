var page = require('webpage').create();
 
//page.open('http://net.tutsplus.com', function (s) {
    //console.log(s);
    //phantom.exit();
//});

//page.open('http://yii.loc/store/?r=admin/fileUploader', function () {
    //var title = page.evaluate(function () {
        //return document.title;
    //});
    //console.log(title);
    //phantom.exit();
//});


//page.open('http://yii.loc/store/?r=admin/fileUploader', function () {
page.open('http://yii.loc/store/test/ts.html', function () {
    var title = page.evaluate(function () {
        return document.title;
    });
    console.log(title);
    phantom.exit();
});
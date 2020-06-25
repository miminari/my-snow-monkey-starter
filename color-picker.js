const fs = require('fs');
const ejs = require('ejs');

//テンプレ作成
let template = "$theme-colors: (<%- editor_colors -%>);";

//color_config.jsonを読み込み
const colors_json = JSON.parse(fs.readFileSync('./color-config.json', 'utf8'));
const colors_obj = Object.keys(colors_json);//objectに変換
let editor_colors_txt = "";

colors_obj.forEach((key) => {
    const color =  '"' + key + '"' + ' : ' + colors_json[key] + ',\n';
    console.log(color);
    editor_colors_txt += color;
});

let scss = ejs.render(template,{editor_colors: editor_colors_txt});
fs.writeFileSync('./src/scss/_color_config.scss',scss);

console.log(colors_obj.length + 'color has been set.');

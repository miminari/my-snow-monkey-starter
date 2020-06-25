const fs = require('fs');
const glob = require("glob");
const path = require('path');
const ejs = require('ejs');

let template = `
<span style="visibility: hidden; position: absolute; z-index: -1; bottom:0;">
<!-- SVG-Sprite -->
<%- svgsprite %>
</span>
`.trim();

let svgspriteContent = fs.readFileSync('../build/svg/svgsprite.svg', 'utf8');

let html = ejs.render(template, {svgsprite: svgspriteContent});
fs.writeFileSync('../includes/view/template-parts/global/svgsprite.php', html);

let demoTemplate = fs.readFileSync('svgsprite-demo.ejs', 'utf8');
let theme = fs.readFileSync('svgsprite-demo.css', 'utf8');
let context = {svgsprite: svgspriteContent, theme: theme};

glob("../build/svg/icons/**/*.svg", function (err, files) {
    if (err) {
        console.log(err);
        return;
    }

    context.files = files.map(function(file){
        return path.basename(file, '.svg');
    });

    let demoHtml = ejs.render(demoTemplate, context);
    fs.writeFileSync('../build/svgsprite-demo.html', demoHtml);
});

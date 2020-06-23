const packageJson = require('./package.json');
const version = packageJson.version;
const path = require("path");
module.exports = (env, argv) => {
    const conf = {
        entry: './src/js/index.js',
        output: {
            path: __dirname + '/build',
            filename: argv.mode === 'production' ? `main.min.js` : `main.js`
        }
    };
    return conf;
};

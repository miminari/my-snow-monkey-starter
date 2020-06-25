//const imagemin = require('imagemin');
const imagemin = require('@ixkaito/imagemin');
const imageminSvgo = require('imagemin-svgo');


(async () => {
	const files = await imagemin(['src/svg/icons/*.svg'], {
		destination: 'build/svg/icons',
		plugins: [
			imageminSvgo({
				plugins: [
          // {cleanupIDs: {remove: false}},
          {cleanupNumericValues: {floatPrecision: 2}},
          {removeViewBox: false},
          {removeStyleElement: true},
          {removeUselessStrokeAndFill: true},
          {removeTitle: true}
        ],
        multipass: true
			})
		]
	});

	console.log(files);
	//=> [{data: <Buffer 89 50 4e …>, destinationPath: 'build/images/foo.jpg'}, …]
})();
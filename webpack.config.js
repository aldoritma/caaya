var webpack = require('webpack');
var path = require("path");
var HtmlWebpackPlugin = require('html-webpack-plugin');
var ExtractTextPlugin = require("extract-text-webpack-plugin");
var CopyWebpackPlugin = require('copy-webpack-plugin');
var WebpackAutoInject = require('webpack-auto-inject-version');

var dist =  path.resolve(__dirname, 'dist');
var src =  path.resolve(__dirname, 'src');

var isProd = process.env.NODE_ENV === 'production';
var cssDev = ['style-loader', 'css-loader?sourceMap!', 'sass-loader?sourceMap=true'];

var cssProd = ExtractTextPlugin.extract({
	fallback: 'style-loader',
	use: ['css-loader','sass-loader'],
    publicPath: './'
})

var cssConfig = isProd ? cssProd : cssDev;


module.exports = {
	devtool: 'source-map',
	entry: {
		// app: src +'/app.js',
		home: src + '/js/home.js',
		about: src + '/js/about.js',
		contact: src + '/js/contact.js',

		// vendor: ['gsap']
	},
	output: {
		path: dist,
		filename: '[name].bundle.js',
	},
	// externals: {
	//   gsap	: 'gsap'
	// },
	module: {
		rules: [
			{
				test: /\.html$/,
				use: [{
					loader: 'html-loader',
					options: {
						minimize: false
					}
				}]
			},
            {
                test: /\.scss$/,
                use: cssConfig
            },
            {
            	test: /\.js$/,
            	exclude:  /(node_modules|bower_components)/,
            	use: {
            		loader: 'babel-loader',
	            	options: {
						presets: 'es2015',
					}
            	}
            },
            {
            	test: /\.(eot|ttf|woff|woff2)$/,
            	use: 'file-loader?name=fonts/[name].[ext]&outputPath=/'
            },
			{
				test: /\.(jpe?g|png|gif|svg)$/i,
				use: [

				    {
						loader: 'file-loader?name=[name].[ext]&outputPath=img/'
				    },
				    {
						loader: 'image-webpack-loader',
						options: {
							query: {
								mozjpeg: {
									progressive: true,
								},
								gifsicle: {
									interlaced: true,
								},
								optipng: {
									optimizationLevel: 7,
								}
							}
						}
				    }
			    ]
			}
        ]
	},
	plugins: [
		// new webpack.optimize.CommonsChunkPlugin({
		// 	name: "vendor",
		// 	filename: "vendor.js",
		// 	minChunks: Infinity
		// }),
		new HtmlWebpackPlugin({
			hash: true,
			template: './src/index.html',
			chunks: ['home']
		}),
		new HtmlWebpackPlugin({
			hash: true,
			filename: 'about.html',
			template: './src/about.html',
			chunks: ['about']
		}),
		new HtmlWebpackPlugin({
			hash: true,
			filename: 'contact.html',
			template: './src/contact.html',
			chunks: ['contact']
		}),
		new ExtractTextPlugin({
            filename: 'app.css',
            disable: !isProd,
            allChunks: true
        }),

        // For global access to jquery
        new webpack.ProvidePlugin({
		    $: "jquery",
		    jQuery: "jquery"
	    }),

	    new CopyWebpackPlugin([
	    	{
                from: src + '/multimedia',
                to: dist + '/multimedia',
                toType: 'dir'
            }
    	]),

    	new WebpackAutoInject({
        	SHORT: 'HFG Development',
            components: {
                AutoIncreaseVersion: false
            },
            componentsOptions: {
				AutoIncreaseVersion: {
					runInWatchMode: false
				},
				InjectAsComment: {
					tag: 'Version: {version} - {date}',
					dateFormat: 'h:MM:ss TT'
				},
				InjectByTag: {
					fileRegex: /\.+/,
					dateFormat: 'h:MM:ss TT'
				}
			},
        }),

        new webpack.HotModuleReplacementPlugin(),

	    new webpack.NamedModulesPlugin()
	],
	devServer: {
	    contentBase: path.resolve(__dirname, './src/'),
		compress: true,
		hot: true,
		open: true,
		openPage: '',
		historyApiFallback: true,
		port: 8080
  	}
};

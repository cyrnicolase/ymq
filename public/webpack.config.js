const webpack = require('webpack');
const path = require('path');

const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const vuxLoader = require('vux-loader');

var config = {
    entry: "./js/index.js",
    output: {
        path: path.resolve(__dirname, 'dist'),
        publicPath: '/dist/',   // 异步加载路由
        filename: process.env.NODE_ENV = 'production' ? '[name].[hash:8].js' : '[name].js',
        chunkFilename: process.env.NODE_ENV === 'production' ? '[name].[hash:8].js' : '[name].js'
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                use: ['babel-loader?cacheDirectory'],
                exclude: /node_modules/
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.(html|tpl)$/,
                use: ['html-loader'],
            },
            {
                test: /\.(png|gif|svg)$/,
                use: ['url-loader?limit=4098']
            }
        ]
    },
    resolve: {
        alias: {
            '~home': path.resolve(__dirname, './views/home/'),
        },
        extensions: ['.js', '.vue', '.json']
    },
    watch: true,
    plugins: [
        new webpack.ProvidePlugin({Vue: 'vue'}),
        new webpack.optimize.CommonsChunkPlugin({
            name: 'vendor',
            minChunks: function(module) {
                return module.context && -1 !== module.context.indexOf('node_modules')
            }
        }),
        new CleanWebpackPlugin(['dist'], {
            root: '',
            verbose: true,
            dry: false
        }),
        new HtmlWebpackPlugin({
            filename: '../dist/index.html',
            template: './index.html',
            // excludeChunks: ['index']
        }),
    ]
};

if ('production' === process.env.NODE_ENV) {
    config.plugins = (config.plugins || []).concat([
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: '"production"'
            }
        }),
        new webpack.optimize.UglifyJsPlugin({
            sourceMap: true,
            compress: {
                warnings: false
            }
        }),
        new webpack.LoaderOptionsPlugin({
            minimize: true
        })
    ])
}

config = vuxLoader.merge(config, {
    plugins: ['vux-ui']
})

module.exports = config;

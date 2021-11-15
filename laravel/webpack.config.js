const webpack = require('webpack');
const path = require('path');

const ExtractTextPlugin = require('extract-text-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');

module.exports = {
    entry: {
        main: [
            './resources/assets/js/main.js',
            './resources/assets/stylus/main.styl',
        ],
        painel: [
            './resources/assets/painel/painel.js',
            './resources/assets/painel/painel.styl',
        ],
    },
    output: {
        path: path.resolve(__dirname, '../public/assets'),
        filename: 'js/[name].js',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: 'babel-loader',
            },
            {
                test: /\.styl$/,
                exclude: /node_modules/,
                use: ExtractTextPlugin.extract({
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                url: false,
                            },
                        },
                        {
                            loader: 'stylus-loader',
                            options: {
                                use: [require('rupture')()],
                            },
                        },
                    ],
                }),
            },
        ],
    },
    plugins: [
        new webpack.optimize.UglifyJsPlugin({
            compress: { warnings: false },
            output: { comments: false },
        }),
        new ExtractTextPlugin('css/[name].css'),
        new OptimizeCssAssetsPlugin({
            cssProcessorOptions: {
                safe: true,
            },
        }),
        new BrowserSyncPlugin({
            host: 'localhost',
            port: 3000,
            proxy: 'localhost:8000',
        }),
    ],
};

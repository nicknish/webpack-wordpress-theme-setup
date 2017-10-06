const path = require('path')
const webpack = require('webpack')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const ImageminPlugin = require('imagemin-webpack-plugin').default
const CopyWebpackPlugin = require('copy-webpack-plugin')

// ======================================================
// ====================== Plugins =======================
// ======================================================

const bootstrap4Provider = new webpack.ProvidePlugin({
  $: 'jquery',
  jQuery: 'jquery',
  'window.jQuery': 'jquery',
  Popper: ['popper.js', 'default']
})

const extractStyles = new ExtractTextPlugin({
  filename: './css/main.css'
});

const copyPlugin = new CopyWebpackPlugin([{
  from: './_assets/img',
  to: './img/'
}]);

const imgMin = new ImageminPlugin({
  test: /\.(jpeg|jpg|png|gif|svg)$/i,
  optipng: {
    optimizationLevel: 7
  }
})


// ======================================================
// ====================== Config ========================
// ======================================================

module.exports = {
  entry: './_assets/js/main.js',
  output: {
     filename: "js/bundle.js",
     path: path.join(__dirname, "bundler"),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['env']
          }
        }
      },
      {
        test: /\.scss$/,
        use: extractStyles.extract({
          fallback: 'style-loader',
          use: ['css-loader', 'postcss-loader', 'sass-loader']
        })
      }
    ]
  },
  plugins: [
    bootstrap4Provider,
    extractStyles,
    copyPlugin,
    imgMin
  ]
};
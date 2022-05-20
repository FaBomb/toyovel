const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  mode: 'development',
  entry: "./src/app/ts/index.ts",
  output: {
    path: path.resolve(__dirname, "src/public"),
    filename: "bundle.js"
  },

  module: {
    rules: [
      {
        test: /(\.s[ac]ss)$/,
        use: [
          "style-loader",
          "css-loader", 
          "postcss-loader", 
          "sass-loader" 
        ]
      },
      {
        test: /\.ts$/,
        use: "ts-loader",
      }
    ]
  },
  resolve: {
    modules: ["node_modules"],
    extensions: [".ts", ".js"]
  },
};

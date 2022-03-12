module.exports = {
  transpileDependencies: ["vuetify"],
  publicPath:
    process.env.NODE_ENV === "production" ? "/fantascarbonasso/" : "/",
  outputDir: "/fantascarbonasso",
  productionSourceMap: process.env.NODE_ENV !== "production",
};

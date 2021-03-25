var configRangeSlider = {
    min:0,
    max:30,
    steps:30,
    onRangeChange:function(slider){
        console.log(slider);
    }
 };
 var configPriceSlider = {
    min:0,
    max:100000,
    steps:100,
    onRangeChange:function(slider){
        console.log(slider);
    }
 };
var periodSlider = RangeSlider.create('#period_slider', configRangeSlider);
var priceSlider = PriceSlider.create('#ps', configPriceSlider);
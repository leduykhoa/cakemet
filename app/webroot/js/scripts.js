/**
 * Created by ldk on 1/14/15.
 */

//jQuery("#keyword").keyup(function () {
jQuery(".btn-search").click(function () {

    var keyword = jQuery(".keyword").val();

    if (keyword == "" || keyword.length < 3) {
        return
    } else {
        jQuery(".keyword_search").html(keyword);
    }
    jQuery(".onload").show();
    jQuery.ajax({
        type: "POST",
        cache: false,
        url: "/metcake/twitter/searchBox",
        data: {keyword: keyword}
    }).done(function (result) {
        result = jQuery.parseJSON(result);

        jQuery(".onload").hide();

        var htmlWp = "<div class=\"row\">__content__</div>";
        var htmlDefaul ="";

        //htmlDefaul +="<div class=\"list-group-item\">";
        htmlDefaul +="<div class=\"col-xs-6 col-sm-3 col-md-3 col-lg-3\">";
        htmlDefaul +="<div class=\"\" style=\"padding-top:10px;\">";

        htmlDefaul += "<img src=\"__src__\" class=\"pull-left\" width=\"50px\" />";


        htmlDefaul += "<ul class=\"pull-left\" style=\"font-size: 80%; list-style: none;margin:0 0 0 20px;\">";

        htmlDefaul +="<li class=\"info-item id\">Id: __id__</li>";
        htmlDefaul +="<li class=\"info-item name\">Name: __name__</li>";
        htmlDefaul +="<li class=\"info-item screen_name\">Screen Name: <a href=\"https://twitter.com/__screen_name__\" target=\"_blank\">__screen_name__</a></li>";

        htmlDefaul +="<li class=\"info-item statuses_count\">Statuses Count: __statuses_count__</li>";
        htmlDefaul +="<li class=\"info-item followers_count\">Followers Count: __followers_count__</li>";
        htmlDefaul +="<li class=\"info-item friends_count\">Friends Count: __friends_count__</li>";
        htmlDefaul +="<li class=\"info-item listed_count\">Listed Count: __listed_count__</li>";
        htmlDefaul +="<li class=\"info-item favourites_count\">Favourites Count: __favourites_count__</li>";
        htmlDefaul +="<li class=\"info-item location\">Location: __location__</li>";
        htmlDefaul +="<li class=\"info-item created_at\">Created At: __created_at__</li>";

        htmlDefaul += "</ul>";

        htmlDefaul +="<div class=\"clearfix\"></div>";

        htmlDefaul += "<div class=\"caption\">";
        htmlDefaul +="<strong>Description:</strong> __description__";
        htmlDefaul +="</div>";


        htmlDefaul +="</div>";
        htmlDefaul +="</div>";

        var html = "";
        var styleRow = "";
        var countRow = 0;

        //jQuery(".keyword_count").html(result.statuses.length);

        for(var i = 0; i<result.statuses.length; i++){
            var user = result.statuses[i];
            var htmlItem = htmlDefaul;

            htmlItem = htmlItem.replace(/__id__/gi, user.user.id);
            htmlItem = htmlItem.replace(/__name__/gi, user.user.name);
            htmlItem = htmlItem.replace(/__src__/gi, user.user.profile_image_url);
            htmlItem = htmlItem.replace(/__screen_name__/gi, user.user.screen_name);
            htmlItem = htmlItem.replace(/__statuses_count__/gi, user.user.statuses_count);
            htmlItem = htmlItem.replace(/__followers_count__/gi, user.user.followers_count);
            htmlItem = htmlItem.replace(/__friends_count__/gi, user.user.friends_count);
            htmlItem = htmlItem.replace(/__listed_count__/gi, user.user.listed_count);
            htmlItem = htmlItem.replace(/__favourites_count__/gi, user.user.favourites_count);
            htmlItem = htmlItem.replace(/__location__/gi, user.user.location);
            htmlItem = htmlItem.replace(/__created_at__/gi, user.user.created_at);

            htmlItem = htmlItem.replace(/__description__/gi, user.user.description);

            //set row new
            if(i!=0 && i%4==0){
                // set class odd and even
                if(countRow++%2==0){
                    styleRow = " style=\"background-color: #f7f7f9;\"";
                }else{
                    styleRow = "";
                }
                html+="</div><div class=\"row\" "+styleRow+">";
            }
            html += htmlItem;
        }
        //
        jQuery(".keyword_result").html(htmlWp.replace("__content__", html));
    });
});
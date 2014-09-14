/*FeedEk jQuery RSS/ATOM Feed Plugin v2.0
* http://jquery-plugins.net/FeedEk/FeedEk.html
* https://github.com/enginkizil/FeedEk
* Author : Engin KIZIL http://www.enginkizil.com */

(function($) {
    $.fn.FeedExtra3 = function(opt) {

		// default settings:
        var def = $.extend({
            FeedUrl: "http://rss.cnn.com/rss/edition.rss",
            MaxCount: 5,
            ShowDesc: true,
            ShowPubDate: true,
            CharacterLimit: 0,
            TitleLinkTarget: "_blank",
            DateFormat: "",
            DateFormatLang: "en"
        }, opt);
        var id = $(this).attr("id"),
            i, s = "",
            dt;

        $.ajax({
            url: "http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=" + def.MaxCount + "&output=json&q=" + encodeURIComponent(def.FeedUrl) + "&hl=en&callback=?",
            dataType: "json",
            success: function(data) {
                $("#" + id).empty();
                $.each(data.responseData.feed.entries, function(e, item) {
                    //s += '<li><div class="itemTitle"><a href="' + item.link + '" target="' + def.TitleLinkTarget + '" >' + item.title + "</a></div>";

					// s += '<div class="well"><h4><a href="' + item.link + '" target="' + def.TitleLinkTarget + '" >' + item.title + "</a></h4>";
					s += '	<div class="panel panel-default">';
					s += '<div class="panel-heading"><div class="row"><div class="col-md-10"><h4>' + item.title + '</h4></div><div class="col-md-2">';

					if (def.ShowPubDate) {
                        dt = new Date(item.publishedDate);
                        if ($.trim(def.DateFormat).length > 0) {
                            try {
                                moment.lang(def.DateFormatLang);
                                s += '<p class="text-right">' + moment(dt).format(def.DateFormat) + "</p>"
                            } catch (e) {
                                s += '<p class="text-right">' + dt.toLocaleDateString() + "</p>"
                            }
                        } else {
                            s += '<p class="text-right">' + dt.toLocaleDateString() + "</p>"
                        }
                    }
					s += '</div></div></div>';

					s += '	<div class="panel-body">';
                    if (def.ShowDesc) {
                        if (def.DescCharacterLimit > 0 && item.content.length > def.DescCharacterLimit) {
                            //s += '<div class="itemContent">' + item.content.substr(0, def.DescCharacterLimit) + "...</div>"

							s += '<p>' + item.content.substr(0, def.DescCharacterLimit) + "...</p>"

                        } else {
                            //s += '<div class="itemContent">' + item.content + "</div>"

							s += '<p>' + item.content + "</p>"

					    }
                    }
                    s += '<p  class="text-center"><video src="'+ item.link +'" type="video/mp4" controls width="95%" ></video></p>';

                    s += '</div>';
                    //s += '<div class="panel-footer"><a href="'+ item.link +'" target="_blank">Zum Video</a></div>';
					s += '</div>';
                });
				$("#" + id).append('<div class="FeedExtra3List">' + s + "</div>")
                //$("#" + id).append('<ul class="feedEkList">' + s + "</ul>")
				//$("#" + id).append('<div class="well well-lg">' + s + "</div>")
            }

        })
    }
})(jQuery);

;(function($) {
    var $menu = $('#category-filter'),
        $cards = $('.card', '#feed-list'),
        api = API_URL + '/api.php',
        repost = API_URL + '/repost.php',
        tpl_feed = _.template($('#tpl-feed').html()),
        tpl_recent = _.template($('#tpl-recent').html()),
        cache = {}; // cache simple lets us load each feed ONCE per page load

    function handleResponse(data) {
        // sections
        var $container = $('.feeds', '#' + data.category),
            feed, $feed, item, $item, id;

            // recent list
        var $list_container = $('.recent-list', '#' + data.category),
            $list_grid = $('.list-grid', '#' + data.category);

        if (data.success == false) {
            $container.html('ERROR: ' + data.errmsg);
        } else {
            $list_grid.empty();
            $list_grid.append($(tpl_recent({
                type: data.category,
                items: data.list
            })));

            $container.empty();
            for (id in data.feeds) {
                feed = data.feeds[id];
                $feed = $(tpl_feed({
                    type : data.category,
                    title : (data.category == 'contributors') ? feed.author : feed.title,
                    items : feed.items
                }));
                $feed.appendTo($container);
            }

            // cache that we have retrieved
            cache[data.category] = true;
        }
    }

    // Ajax call to load requested category
    function loadFeedsByCat(cat, dest) {
        $.ajax({
        url : api,
        type : 'GET',
        dataType : 'json',
            data : { 'cat' : cat },
            success : function(res) {
                handleResponse(res);
            }
        });
    }

    // Handle the click of individual menu items
    $menu.on('click', 'a', function(e) {
        if (!$(this).hasClass('btn')) {
            e.preventDefault();
            $('li', $menu).removeClass('active');
            $(this).closest('li').addClass('active');

            $cards.hide();
            $('#' + $(this).data('category')).show();
            if (undefined === cache[$(this).data('category')]) {
                // Load category
                loadFeedsByCat($(this).data('category'), $('#' + $(this).data('category') + ' .feeds'));
            }
        }
    });

    $cards.on('click', 'a[data-action="repost"]', function (e) {
        var author = $(this).data('author');
        var title = $(this).closest('tr').find('.item-title > a').html();
        console.log(author, title);

        $.ajax({
            url: repost,
            type: 'POST',
            dataType: 'json',
            data: {
                'author': author,
                'title': title
            },
            success: function (res) {
                if (res.success == false) {
                    console.error(res.errmsg);
                } else {
                    // redirect to edit newly created post
                    window.location = res.edit_link;
                }
            }
        });
    });
}(jQuery));


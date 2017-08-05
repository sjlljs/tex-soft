var body = $('body');

body.on('click', '.js-modal-show', function (e) {
    e.preventDefault();

    var url = ($(this).attr('href'))?$(this).attr('href'):$(this).data('url'),
        $modal = $('#ajax-modal'),
        $button = $(e.target),
        title = $(this).attr('modal-title'),
        request = $.ajax({
            url: url,
            type: "POST"
        });

    request.success(function (response) {
        $modal.find('.modal-body').html(response);

        if ((title !== null) && (title !== null)) {
            $modal.find('.modal-title').text(title);
        } else {
            $modal.find('.modal-title').text($button.text());
        }

        $modal.modal('show');
    });
});
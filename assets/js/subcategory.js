$(function () {
  $('#posts-table').DataTable({
    'ajax': {
      'url': window.location.origin + '/blog/index.php/subcategory/get_subcategory_posts/' + $('main').attr('data-subcat-id'),
      'dataSrc': '',
      'type': 'GET',
    },
    'columns': [
      { 'data': 'id' },
      {
        'data': 'title',
        'render': function ( data, type, row, meta ) {
          return '<a href="' + window.location.origin
            + '/blog/index.php/post/index/' + row.id
            + '">' + data + '</a>';
        }
      },
      { 'data': 'date' },
    ]
  });
});

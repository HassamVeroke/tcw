document.addEventListener('DOMContentLoaded', function () {

    const filters = document.querySelectorAll('.blog-filter');
    const results = document.getElementById('blog-results');

    if (!filters.length || !results) {
        return;
    }

    filters.forEach(function (filter) {

        filter.addEventListener('click', function () {

            const category = this.dataset.category;

            filters.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            results.classList.add('is-loading');

            const formData = new FormData();

            formData.append('action', 'tcw_filter_blog_posts');
            formData.append('category', category);
            formData.append('nonce', tcwBlog.nonce);

            fetch(tcwBlog.ajaxUrl, {
                method: 'POST',
                body: formData
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {

                    if (data.success) {
                        results.innerHTML = data.data.html;
                    }

                })
                .catch(function (error) {
                    console.error('Blog filter error:', error);
                })
                .finally(function () {
                    results.classList.remove('is-loading');
                });

        });

    });

});
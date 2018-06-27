var tags = document.querySelectorAll('.tags__item');

for (var i = 0; i < tags.length; i++) {

    tags[i].onclick = function (e) {

        var active = this.querySelector('.tag');
        var tag = active.textContent;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {

            if (this.readyState === 4 && this.status === 200) {

                var blog = document.getElementsByClassName('blog-layout')[0];
                blog.innerHTML = xhr.responseText;

                var tags = document.getElementsByClassName('tag');

                for (var i = 0; i < tags.length; i++) {

                    tags[i].classList.remove('tag--active');
                }

                active.classList.add('tag--active');
            }
        }

        xhr.open('GET', '/get-papers?tag=' + tag, true);

        xhr.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].getAttribute("content"));

        xhr.send();

    };
}

document.getElementsByClassName('blog-layout__btn')[0].onclick = function (e) {

    e.preventDefault();
    var button = this;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {

            var response = JSON.parse(xhr.responseText);
            button.insertAdjacentHTML('beforeBegin', response.papers);
            button.href = response.nextPageUrl;
        }
    }

    var tag = document.querySelector('.tag.tag--active');
    xhr.open('GET', button.getAttribute('href')+'&tag='+tag.textContent, true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].getAttribute("content"));

    xhr.send();

};



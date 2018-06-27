var tags = document.querySelectorAll('.tags__item');

for (var i = 0; i < tags.length; i++) {

    tags[i].onclick = function (e) {

        var active = this.querySelector('.tag');
        var tag = active.textContent;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {

            if (this.readyState === 4 && this.status === 200) {

                var response = JSON.parse(xhr.responseText);
                console.log(Object.keys(response));
                var map = document.getElementById('filters');
                console.log(map);
                map.innerHTML = response.points;

                var items = document.getElementsByClassName('grid-item');

                while (document.getElementsByClassName('grid-item')[0]) {

                    document.getElementsByClassName('grid-item')[0].remove();
                }

                var cards = document.getElementsByClassName('grid')[0];
                cards.insertAdjacentHTML('beforeEnd', response.cards);

                var tags = document.getElementsByClassName('tag');

                for (var i = 0; i < tags.length; i++) {

                    tags[i].classList.remove('tag--active');
                }

                active.classList.add('tag--active');

                elem.dispatchEvent('DOMContentLoaded');
            }
        };

        xhr.open('GET', '/get-points?tag=' + tag, true);

        xhr.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].getAttribute("content"));

        xhr.send();

    };
}

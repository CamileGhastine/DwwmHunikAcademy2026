let seeMore = document.getElementById('seeMore');
let commentBatch = 1;

seeMore.addEventListener('click', () => {
    fetch('?route=seeMoreAjax&commentBatch=' + commentBatch)
    .then(response => response.json())
    .then(comments => {
        displayComments(comments);
        commentBatch++
    })
    .catch(error => console.error(error.message))
})

function displayComments(comments) {
    if (comments.length === 0) {
        document.getElementById('seeMoreP').textContent = "Tous les commentaires son affichées.";
        return;
    }
    comments.forEach(comment => {
        let li = document.createElement('li');
        li.innerHTML = comment.liked + ' <span class="like" data-id="' + comment.id + '">👍</span> - ' +comment.content;
        document.querySelector('ul'). appendChild(li)
    });
    likes = document.querySelectorAll('.like');
}


let likes = document.querySelectorAll('.like');
likes.forEach(like => {
    like.addEventListener('click', () => {
        fetch('?route=likeAjax&id=' + like.dataset.id)
        .then(response => response.json())
        .then(comment => like.previousElementSibling.textContent = comment.liked)
        .catch(error => console.log(error.message))
    })
})

let form = document.querySelector('form');
form.addEventListener('submit', (event) => {
    event.preventDefault();
    fetch('?route=addAjax', {
        method: 'POST',
        headers: {'content-Type': 'application/json'},
        body: JSON.stringify({"content": form.content.value})
    })
    .then(response => response.json())
    .then(data => console.log(data))

})




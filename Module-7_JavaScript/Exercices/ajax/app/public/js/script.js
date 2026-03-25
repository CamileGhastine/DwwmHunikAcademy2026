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
        li.innerHTML = comment.liked + ' <span class="like">👍</span> - ' +comment.content;
        document.querySelector('ul'). appendChild(li)
    });
}




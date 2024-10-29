const likePost = async (element, csrfToken, pathToIconLike, pathToIconLiked) => {
    const url = element.dataset.liked === '1' ? element.dataset.unlikeUrl : element.dataset.likeUrl;
    const method = element.dataset.liked === '1' ? 'DELETE' : 'POST';

    const response = await fetch(url, {
        method,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })

    const result = await response.json();

    const counter = document.querySelector(`.post-preview__likes-amount[data-post-id="${element.dataset.postId}"]`);
    const counterOriginalValue = counter.dataset.originalValue.split(':');
    if (result['liked'] === '1') {
        console.log('liked')
        element.src = pathToIconLiked
        element.dataset.liked = '1';
        if (counterOriginalValue[1] === '1') return counter.innerText = counterOriginalValue[0];
        counter.innerText = Number(counterOriginalValue[0]) + 1
        return;
    }
    element.src = pathToIconLike;
    element.dataset.liked = '0';
    if (counterOriginalValue[1] === '0') return counter.innerText = counterOriginalValue[0];
    counter.innerText = Number(counterOriginalValue[0]) - 1
}

const init = () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const pathToIconLike = document.querySelector('meta[name="icon-like"]').getAttribute('content');
    const pathToIconLiked = document.querySelector('meta[name="icon-liked"]').getAttribute('content');
    document.addEventListener('click', (event) => {
        if (!Array.from(event.target.classList).includes('post-preview__likes-button')) return
        likePost(event.target, csrfToken, pathToIconLike, pathToIconLiked)
        const post_id = event.target.dataset.postId;
        console.log(post_id)
    })
}

window.addEventListener('load', init);

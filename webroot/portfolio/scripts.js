function areYouSure(){
    window.confirm("are you sure you want to clear this form?")
}

function preventDefault(){
    let postTitle = document.getElementById("title")
    let postContent = document.getElementById("post")
    var cancelButton = false

    if (postTitle.value.length <= 0){
        alert("you need a blog post title to post!")
        postTitle.style.backgroundColor = "red"
        cancelButton = true
    }

    if (postContent.value.length <= 0){
        alert("you need blog post content to post!")
        postContent.style.backgroundColor = "red"
        cancelButton = true
    }

    return !cancelButton

}
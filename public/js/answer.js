function toggleReplyForm(commentId) {
    const replyContainer = document.getElementById(
        `reply-container-${commentId}`
    );
    if (replyContainer.classList.contains("hidden")) {
        replyContainer.classList.remove("hidden");
    } else {
        replyContainer.classList.add("hidden");
    }
}

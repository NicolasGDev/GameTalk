tinymce.init({
    selector: "textarea",
    height: 600,
    plugins: [
        // Core editing features
        "anchor",

        "image",

        "image",
        "link",
        "lists",
    ],
    toolbar:
        "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | image",
    tinycomments_mode: "embedded",
    tinycomments_author: "Author name",

    ai_request: (request, respondWith) =>
        respondWith.string(() =>
            Promise.reject("See docs to implement AI Assistant")
        ),
});

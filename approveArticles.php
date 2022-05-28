<?php
    include 'test.php';
    $article_id = $_GET['id'];
    $pend_article=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pending_articles WHERE id='$article_id'"));
    $article_users_id = $pend_article['Users_id'];

    $article_title = $pend_article['title'];
    $article_subject = $pend_article['subject'];
    $article_content = $pend_article['context'];

    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM Articles WHERE title='$article_title' AND subject='$article_subject' ")))
        mysqli_query($conn, "UPDATE Articles SET context = '$article_content' WHERE title = '$article_title' AND subject = '$article_subject'");
    else
        mysqli_query($conn,"INSERT INTO Articles (users_id,title,subject,context) VALUES ('$article_users_id','$article_title','$article_subject','$article_content')");
    mysqli_query($conn, "DELETE FROM pending_articles WHERE id in ('$article_id')");

    header('Location: account.php');

?>
<?php

    include 'test.php';

    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM Articles_search")))
    {

        mysqli_query($conn,"DELETE FROM Articles_search");
    }


    $search_query = $_POST['search'];
    $array_search= explode(' ', $search_query);


    foreach ($array_search as $word)
    {

        $sql_search = "SELECT * FROM Articles WHERE title LIKE '%$word%' OR context LIKE '%$word%' UNION SELECT Articles.id, Users_id, title, subject, context FROM users INNER JOIN Articles ON Users_id = users.id WHERE Users.first_name LIKE '$word' OR Users.last_name LIKE '$word';";
        $result_search = mysqli_query($conn,$sql_search);
        echo mysqli_num_rows($result_search);
        while($row_result = mysqli_fetch_assoc($result_search))
        {


            $art_id=$row_result['id'];
            $art_users_id=$row_result['Users_id'];
            $art_title=$row_result['title'];
            $art_subject=$row_result['subject'];
            $art_content=$row_result['context'];

            mysqli_query($conn,"INSERT INTO Articles_search(id,Users_id,title,subject,content) VALUES ('$art_id','$art_users_id','$art_title','$art_subject','$art_content')");
            header('Location: articles.php?search=true;');

        }
        if (mysqli_num_rows($result_search)==0)
        {
            header('Location: articles.php?search=true');
        }
    }


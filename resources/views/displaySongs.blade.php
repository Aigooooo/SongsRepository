<html>
    <head>
        <title>Songs</title>
    </head>
    <body>
        <table>
            <thead>
                <th>
                    Song Title
                </th>
                <th>
                    Author
                </th>
                <th>
                    Release Year
                </th>
            </thead>
            <tbody id='songsTable'>
                
            </tbody>
        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                function getSongs(){
                    $.ajax({
                        url: '/api/viewSongs',
                        method: 'GET',
                        success: function(response){
                            if(response.status == 200){
                                var songs = response.songs;
                                var songList = $('#songsTable');
                                $.each(songs, function(index, song){
                                    songList.append(
                                        "<tr>" + 
                                        "<td>" + song.song_title + "</td>" +
                                        "<td>" + song.author_name + "</td>" +
                                        "<td>" + song.release_year + "</td>" +
                                        "</tr>"
                                    );
                                });
                            }else{
                                console.log(response.message);
                            }
                        }    
                    });
                }
                getSongs();
            });
        </script>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="../../assets/css/startup_style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<style>
    body{
            font-family: "Sofia", sans-serif; 
            background-color: transparent;
        }
</style>


<div class="search-bar">
                    <form> 
                        <input type="text" name="search_text" id="search_text" placeholder="Search...">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M15.853 16.56c-1.683 1.517-3.911 2.44-6.353 2.44-5.243 0-9.5-4.257-9.5-9.5s4.257-9.5 9.5-9.5 9.5 4.257 9.5 9.5c0 2.442-.923 4.67-2.44 6.353l7.44 7.44-.707.707-7.44-7.44zm-6.353-15.56c4.691 0 8.5 3.809 8.5 8.5s-3.809 8.5-8.5 8.5-8.5-3.809-8.5-8.5 3.809-8.5 8.5-8.5z"/></svg>
                    </form>
                </div>
                
                <script>
                    $(document).ready(function(){

                        load_data();

                        function load_data(query){
                            $.ajax({
                            url:"fetch.php",
                            method:"POST",
                            data:{query:query},
                                success:function(data){
                                    $('#result').html(data);
                                }
                            });
                        }
                        $('#search_text').keyup(function(){
                            var search = $(this).val();
                            if(search != ''){
                                load_data(search);
                            }
                            else{
                                load_data();
                            }
                        });
                    });
                </script>
                <br>
                <div class="investor-profile">
                    
                        <div id="result" class="profile-flex"></div>
                    
                </div>
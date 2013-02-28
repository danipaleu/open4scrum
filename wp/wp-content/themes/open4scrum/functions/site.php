<?php

/**
 * Handles login and create new site
 */
class open4scrum_site{

    function display_login(){

        if ( isset($_POST['button_login'] )){
            $this->login_action();
        }

        $this->login_form();

    }

    function login_form(){

        ?>
        <form class="form-horizontal" method="POST">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="email">Email Address</label>
                    <div class="controls">
                        <input class="input-xlarge focused" name="email" id="email" type="text" value="<?php echo $_POST['email']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input class="input-xlarge focused" name="password" id="password" type="password" value="<?php echo $_POST['password']; ?>">
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" name="button_login">Login</button>
                </div>
            </fieldset>
        </form>
        <?php

        add_action('wp_footer', array($this, 'footer_focus'), 20);

    }

    function footer_focus(){
        ?>
        <script>
            jQuery(document).ready(function($){

                $('input[name="email"]').focus();

            });
        </script>
        <?php
    }

    function display_create(){

        if ( isset($_POST['button_create'] )){
            $this->create_action();
        }

        $this->create_form();

    }

    function create_form(){
        ?>
        <form class="form-horizontal" method="POST">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="company">Company Name</label>
                    <div class="controls">
                        <input class="input-xlarge focused" name="company" id="company" type="text" value="<?php echo $_POST['company']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email Address</label>
                    <div class="controls">
                        <input class="input-xlarge focused" name="email2" id="email2" type="text" value="<?php echo $_POST['email2']; ?>">
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" name="button_create">Create</button>
                </div>
            </fieldset>
            <?php wp_nonce_field('create-site'); ?>
        </form>
        <?php
    }

    function login_action(){

    }

    function create_action(){

        global $wpdb;

        if ( !check_admin_referer( 'create-site' ) ){
            ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Security check!</strong> Something didn't validate correct, no site created!
            </div>
            <?php

            return;
        }

        $company = esc_attr( $_POST['company'] );
        $company_name = esc_attr( $_POST['company'] );

        $company = sanitize_title( $company );

        $email = esc_attr( $_POST['email'] );
        $email = sanitize_email( $email );

        if ( preg_match( '|^([a-zA-Z0-9-])+$|', $company ) )
            $company = strtolower( $company );

        $subdirectory_reserved_names = apply_filters( 'subdirectory_reserved_names', array( 'page', 'comments', 'blog', 'files', 'feed' ) );
        if ( in_array( $company, $subdirectory_reserved_names ) ) {
            ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Duplicate!</strong> The given name could not be used to create a new site!
            </div>
            <?php
            return;
        }

        $user_id = email_exists($email);
        if ( !$user_id ) { // Create a new user with a random password
            $password = wp_generate_password( 8, false );
            $user_id = wp_create_user( $email, $password, $email );
            if ( false == $user_id ){
                ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Error!</strong> Unable to create user!
                </div>
                <?php
                return;
            }
            else
                wp_new_user_notification( $user_id, $password );
        }

        $domain = get_bloginfo('url');
        $domain = str_replace( 'http://', '', $domain );
        $domain = str_replace( 'https://', '', $domain );

        $path = '/' . $company . '/';

        $wpdb->hide_errors();
        $blog_id = wpmu_create_blog( $domain, $path, $company_name, 1 , array( 'public' => 1 ), 1 );
        $wpdb->show_errors();

        if ( $blog_id ){
            add_user_to_blog( $blog_id, $user_id, 'subscriber' );
        }

        $pages = array(
            array(
                'name'  => 'New Page',
                'title' => 'this is page title',
            ),
        );


        $template = array(
            'post_type'   => 'page',
            'post_status' => 'publish',
            'post_author' => 1
        );

        foreach( $pages as $page ) {
            $exists = get_page_by_title( $page['title'] );
            $my_page = array(
                'post_name'  => $page['name'],
                'post_title' => $page['title']
            );
            $my_page = array_merge( $my_page, $template );

            switch_to_blog($blog_id);
            $id = ( $exists ? $exists->ID : wp_insert_post( $my_page ) );
            switch_to_blog(1);
        }

        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Congratulations!</strong> Site <?php echo $company; ?> created, please check your email!
        </div>
        <?php


    }

}
<?php
global $user;
global $theme_path;
global $base_url;
global $language;

// uid == 0 means user is anonymous
if ($user -> uid != 0) {

    $name = $user -> name;
    if ($user -> picture)
        $picture_path = $user -> picture;
    else
        $picture_path = $theme_path . '/images/default_profile_image.png';

    $profile_link = l($name, 'user/' . $user -> uid);
    //$image_tag = theme_image($picture_path);
    $variables = array('path' => $picture_path, 'alt' => t('Go to your account'), 'title' => t('Go to your account'),
    //'width' => '50px',
    //'height' => '50px',
    'attributes' => array('class' => 'profile-img', 'id' => 'profile-img'), );
    $image = theme('image', $variables);

    //$image_link = l($image, 'user/' . $user -> uid);
    $btn = array('#type' => 'button', '#value' => t('New'), '#weight' => 19, );

    $profile = profile2_load_by_user($user -> uid);
    if ($profile) {
        if ($profile['main'])
            $profile_name = 'main';
        else
            $profile_name = 'personal';

        $profiledata = profile2_by_uid_load($user -> uid, $profile_name);

        if ($profiledata) {

            if ($profile_name == 'main') {
                $profile_type = "business";
                $partita_iva = field_get_items('profile2', $profiledata, 'field_partita_iva')[0]['value'];
            } else {
                $profile_type = "personal";
            }
            // var_dump($profile);
        }
    }
}

// links
//$login_link = l(t('Login'), 'business', array('attributes' => array('title' => t('Sign up as company.'), 'class' => 'btn btn-block btn-md')));

//$signup_link = l(t('Create new account'), 'business/register', array('attributes' => array('title' => t('Sign up as company.'), 'class' => 'btn btn-block btn-md')));
$my_profile_link = l(t('My account'), 'user/' . $user -> uid);
?>

<div id="welcome-user-block">
  <div class="row">
   
    <?php if ($user -> uid == 0) : ?>
        <div class="col-md-6 highlighted-block light nopadding">
           <a class="btn btn-block btn-md" href="<?= $base_url . '/user' ?>"><?= t('Login') ?></a>   
        </div>
        <div class="col-md-6 highlighted-block light nopadding">
          <a class="btn btn-block btn-md" href="<?= $base_url . '/business/register' ?>"><?= t('Create new account') ?></a>
        </div>
    <?php else : ?>
        <div class="col-md-8"> 
        <?php //print $my_profile_link ?>
        <a href="<?= $base_url . '/user/' . $user -> uid ?>" >
            <i><?php print t('Welcome back'). " " . $name; ?></i>!<?= $image; ?>
        </a>
        </div>
        <div class="col-md-4 highlighted-block light nopadding">
          <a class="btn btn-block btn-md" href="
          <?= $base_url . '/user/logout' ?>"><?= t('Log out') ?></a>
        </div>
<?php endif; ?>
</div>
</div>


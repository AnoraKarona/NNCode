<?php
//by Karona
class NNcode {
  public function nn_code($entrada) {
    $entrada = strip_tags($entrada);
    $entrada = htmlentities($entrada);
    $codigo = array(
      '/\[b\](.*?)\[\/b\]/is' => '<span style="font-weight:bold;">$1</span>',
      '/\[i\](.*?)\[\/i\]/is' => '<span style="font-style:italic;">$1</span>',
      '/\[u\](.*?)\[\/u\]/is' => '<span style="text-decoration: underline;">$1</span>',
      '/\[del\](.*?)\[\/del\]/is' => '<del>$1</del>',
      '/\[center\](.*?)\[\/center\]/is' => '<p style="text-align: center;">$1</p>',
      '/\[left\](.*?)\[\/left\]/is' => '<p style="text-align: left;">$1</p>',
      '/\[right\](.*?)\[\/right\]/is' => '<p style="text-align: right;">$1</p>',
      '/\[j\](.*?)\[\/j\]/is' => '<p style="text-align: justify;">$1</p>',
      '/\[h1\](.*?)\[\/h1\]/is' => '<h1>$1</h1>',
      '/\[h2\](.*?)\[\/h2\]/is' => '<h2>$1</h2>',
      '/\[h3\](.*?)\[\/h3\]/is' => '<h3>$1</h3>',
      '/\[h4\](.*?)\[\/h4\]/is' => '<h4>$1</h4>',
      '/\[h5\](.*?)\[\/h5\]/is' => '<h5>$1</h5>',
      '/\[h6\](.*?)\[\/h6\]/is' => '<h6>$1</h6>',
      '/\[sup\](.*?)\[\/sup\]/is' => '<sup>$1</sup>',
      '/\[sub\](.*?)\[\/sub\]/is' => '<sub>$1</sub>',
      '/\[code\](.*?)\[\/code\]/is' => '<code>$1</code>',
      '/\[img\](.*?)\[\/img\]/is' => '<img src="$1">',
      '/\[url=(.*?)\](.*?)\[\/url\]/is' => '<a href="$1">$2</a>',
      '/\[color=(.*?)\](.*?)\[\/color\]/is' => '<font style="color:$1">$2</font>',
      '/\[size=(.*?)\](.*?)\[\/size\]/is' => '<font style="font-size:$1">$2</font>',
      '/\[font size=(.*?) color=(.*?)\](.*?)\[\/font\]/is' => '<font style="font-size:$1;color:$2;">$3</font>',
      '/\[video\](.*?)\[\/video\]/is' => '<iframe src="$1" width="500px" height="400" frameborder="0" allowfullscreen></iframe>',
      '/\[ul\](.*?)\[\/ul\]/is' => '<ul>$1</ul>',
      '/\[ol\](.*?)\[\/ol\]/is' => '<ol>$1</ol>',
      '/\[li\](.*?)\[\/li\]/is' => '<li>$1</li>'
    );
    return nl2br(preg_replace(array_keys($codigo), array_values($codigo), $entrada));
  }
}
?>
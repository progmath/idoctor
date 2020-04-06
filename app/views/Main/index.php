<div class="br-d sp_b">
    <i class="fas fa-angle-double-right"></i>
    <i class="fas fa-angle-double-right"></i>
    <i class="fas fa-angle-double-right"></i>
    <i class="fas fa-angle-double-right"></i>
    <i class="fas fa-angle-double-right"></i>
    <i class="fas fa-angle-double-right"></i>
    <i class="fas fa-angle-double-right"></i>
    <i class="fas fa-angle-double-right"></i>

</div>
<?if($hits):?>
  <div class="owl-carousel owl-theme">
      <?foreach ($hits as $hit):?>
        <div class="main">
            <div class="sl_left_div">
                <p class="first_text"><a href="<?=PATH;?>/diagnose/<?= $hit->alias;?>" class="hit_title_link"><?= $hit->arm_title?></a></p>
                <p class="second_text"> <?=substr($hit->arm_content, 0, 1000); ?>
                </p>
                <a href="<?=PATH;?>/diagnose/<?= $hit->alias?>" class="more">Իմանալ ավելին</a>

            </div>
            <?if($hit->img):?>
                <div class="sl_right_div">
                    <img src="Images/<?= $hit->img?>" alt="NO IMAGE">
                </div>
            <?endif;?>
        </div>
        <?endforeach;?>
    </div>
<?endif;?>
<!--only for mobile-->
 <div class="im_sqrining">
     <a href="#" class="b_sqrining" >Իմ սքրինինգը</a>
 </div>
 <!--<div class="list_for_mobile">-->
   <!--  --><?php new \app\widgets\menu\Menu([
         'tpl' => WWW . '/menu/mobile.php',
         'container'=>'div',
         'class'=>'list_for_mobile',
         'cacheKey'=>'idoctor_mobile',
    'condition'=>"WHERE parent_id = '0'",

     ])?>

 <!--</div>-->
<!--end for mobile-->

<footer>
    <div class="footer">
        <div class="sec_footer">
            <div class="biggestP">
                <p id="some" class="counter" data-count="<?=$center_count?>"></p>
            </div>
            <p>Լաբորատորիա և
                <br> հիվանդանոց</p>
        </div>
        <div class="sec_footer">
            <div class="biggestP">
                <p id="some1" class="counter" data-count="<?= $exam_count;?>"></p>
            </div>
            <p>Լաբորատոր և
                <br> գործիքային քննություն</p>
        </div>
        <div class="sec_footer">
            <div class="biggestP">
                <p id="some2" class="counter" data-count="<?=$screening_count?>"></p>
            </div>
            <p>Սքրինինգային
                <br> թեստեր</p>
        </div>

    </div>

</footer>



    <!-- Modal content -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="f_name">
                <p>ԻՄ ՍՔՐԻՆԻՆԳԸ</p>
                <span class="close">&times;</span>
            </div>

            <div class="s_p">
              <form action="/screening/test" method="post">
                <div class="f_drd">

                    <!--Style 2-->
                    <div ><!--class="wrapper"-->
                        <select class="for_age" name="age"><!--class="selection"-->
                            <option selected disabled class="option_title"> Ընտրեք Ձեր տարիքը</option>
                            <option value="0">0-1</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                            <option value="100">100</option>

                        </select>
                    </div>
                </div>

                <div class="f_chk">
                    <span class="option_title">Ընտրեք Ձեր սեռը</span>
                    <div class="chk">
                        <label class="container">Տղամարդ
                            <input type="radio"  name="gender" id="male" value="0" checked>
                            <span class="checkmark"></span>
                        </label>

                        <label class="container">Կին
                            <input type="radio" name="gender" id="female" value="1" >
                            <span class="checkmark"></span>
                        </label>

                    </div>
                </div>

                <div class="f_chk hdd">
                    <span class="option_title">Ընտրեք Ձեր կարգավիճակը</span>
                    <div class="chk">
                        <label class="container">Հղի եմ
                            <input type="radio" checked="checked" name="status" value="1">
                            <span class="checkmark"></span>
                        </label>

                        <label class="container">Հղի չեմ
                            <input type="radio" name="status" value="0" checked>
                            <span class="checkmark"></span>
                        </label>

                    </div>
                </div>
                  <div class="f_chk">
                     <span class="option_title">Արդյոք Դուք ծխում եք, թե ոչ</span>
                      <div class="chk">
                          <label class="container">Ծխում եմ
                              <input type="radio"  name="smoke" value="1">
                              <span class="checkmark"></span>
                          </label>

                          <label class="container">Չեմ ծխում
                              <input type="radio" name="smoke" value="0" checked>
                              <span class="checkmark"></span>
                          </label>

                      </div>
                  </div>
                  <div class="f_chk">
                       <span class="option_title">Սեռական Ակտիվություն</span>
                      <div class="chk">
                          <label class="container">Ակտիվ
                              <input type="radio"  name="activity" value="1">
                              <span class="checkmark"></span>
                          </label>

                          <label class="container">Պասիվ
                              <input type="radio" name="activity" value="0" checked>
                              <span class="checkmark"></span>
                          </label>

                      </div>
                  </div>

                  <input type="submit" name="submit" value="Անցնել Թեստը" class="l_m">
              </form>
            </div>

        </div>

    </div>


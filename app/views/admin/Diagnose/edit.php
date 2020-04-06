<?$code = isset($_SESSION['lang']) ? $_SESSION['lang'] : \PM_Engine\App::$app->getProperty('admin_default_lang');?>
<? $lang = include_once CONF . '/admin_languages.php';?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$lang[$code . '_' . "Edit"];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i><?=$lang[$code . '_' . "Home"];?></a></li>
        <li><a href="<?=ADMIN;?>/diagnose">  <?=$lang[$code . '_' . "Diagnose List"];?></a></li>
        <li class="active"><?= $diagnose['arm_title'];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/diagnose/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="arm_title"><?= $lang[$code . '_' . "Diagnose Name"] .$lang[$code . '_' . "Armenian"];?>* </label>
                            <input type="text"  name="arm_title" class="form-control" id="arm_title" placeholder="<?= $lang[$code . '_' . "Diagnose Name"] .$lang[$code . '_' . "Armenian"];?>" value="<?= h($diagnose['arm_title']);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group">
                            <label for="ru_title"><?= $lang[$code . '_' . "Diagnose Name"] .$lang[$code . '_' . "Russian"];?></label>
                            <input type="text" name="ru_title" class="form-control" id="ru_title" placeholder="<?= $lang[$code . '_' . "Diagnose Name"] .$lang[$code . '_' . "Russian"];?>" value="<?= h($diagnose['ru_title']);?>" >
                        </div>
                        <div class="form-group">
                            <label for="en_title"><?= $lang[$code . '_' . "Diagnose Name"] .$lang[$code . '_' . "English"];?></label>
                            <input type="text" name="en_title" class="form-control" id="en_title" placeholder="<?= $lang[$code . '_' . "Diagnose Name"] .$lang[$code . '_' . "English"];?>" value="<?= h($diagnose['en_title']);?>" >
                        </div>
                        <div class="form-group">
                            <label for="exam_id"><?= $lang[$code . '_' . "Parent Category"]?>*</label>
                            <?$choose = $lang[$code . '_' . "Choose Category"];?>
                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/select.php',
                                'container' => 'select',
                                'cache' => 0,
                                'cacheKey' => 'admin_select',
                                'class' => 'form-control',
                                'attrs' => [
                                    'name' => 'exam_id',
                                    'id' => 'category_id',
                                ],
                                'prepend' => "<option >$choose</option>",
                            ]) ?>
                        </div>

                        <div class="form-group ">
                            <label for="arm_content"><?= $lang[$code . '_' . "Content"] .  $lang[$code . '_' . "Armenian"];?></label>
                            <textarea name="arm_content" id="editor1" cols="80" rows="10" ><?= $diagnose['arm_content'];?> </textarea>

                        </div>
                        <div class="form-group ">
                            <label for="ru_content"><?= $lang[$code . '_' . "Content"] .  $lang[$code . '_' . "Russian"];?></label>
                            <textarea name="ru_content" id="editor2" cols="80" rows="10"><?= $diagnose['ru_content'];?></textarea>

                        </div>
                        <div class="form-group ">
                            <label for="en_content"><?= $lang[$code . '_' . "Content"] .  $lang[$code . '_' . "English"];?></label>
                            <textarea name="en_content" id="editor3" cols="80" rows="10"><?= $diagnose['en_content'];?></textarea>

                        </div>
                        <div class="form-group has-feedback">
                            <label for="min_price" ><?= $lang[$code . '_' . "Min Price"]?>e</label>
                            <input type="text" name="min_price" pattern="^[0-9.]{1,}$"  id="min_price"  class="form-control" value="<?= $diagnose['min_price'];?>" >
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="max_price" ><?= $lang[$code . '_' . "Max Price"]?></label>
                            <input type="text" name="max_price" pattern="^[0-9.]{1,}$"  id="max_price"  class="form-control" value="<?= $diagnose['max_price'];?>" >
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>


                        <div class="form-group col-md-12">
                            <div class="col-md-4">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title"><?= $lang[$code . '_' . "Image"]?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="single" class="btn btn-success" data-url="diagnose/add-image" data-name="single"><?= $lang[$code . '_' . "Choose File"]?></div>
                                        <p><small><?= $lang[$code . '_' . "Recommended Size"];?>: <?= \PM_Engine\App::$app->getProperty('img_width');?>х <?= \PM_Engine\App::$app->getProperty('img_height');?></small></p>
                                        <div class="single">
                                            <?if ($diagnose['img']):?>
                                                <img src="/images/<?=$diagnose['img']?>" alt="No Image" style="max-height: 150px;">
                                            <?endif;?>
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label>
                                <input type="checkbox" name="status" <?= $diagnose['status']  ? "checked" : null; ?> >  <?= $lang[$code . '_' . "Status"]?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="hit" <?= $diagnose['hit'] ? "checked" : null; ?>>  <?= $lang[$code . '_' . "Hit"]?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="screening" <?= $diagnose['screening'] ? "checked" : null; ?> id="screening">  <?= $lang[$code . '_' . "Screening"]?>
                            </label>
                        </div>
                        <div class="box box-primary" id="screening_form">
                            <div  class="box-header with-border">

                                <div class="form-group ">
                                    <label for="min_age"> <?= $lang[$code . '_' . "Min Age"]?></label>


                                    <select name="min_age" id="min_age">
                                        <?if($diagnose['min_age']):?>
                                            <option value="<?= $diagnose['min_age'];?>" selected><?= $diagnose['min_age'];?></option>
                                        <?endif;?>
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
                                <div class="form-group">
                                    <label for="max_age"> <?= $lang[$code . '_' . "Max Age"]?></label>

                                    <select name="max_age" id="max_age">
                                        <?if($diagnose['max_age']):?>
                                            <option value="<?= $diagnose['max_age'];?>" selected><?= $diagnose['max_age'];?></option>
                                        <?endif;?>
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
                                <div class="form-group ">
                                    <label for="video"> <?= $lang[$code . '_' . "Gender"]?></label>
                                    <input type="checkbox" name="male" <?=  $diagnose['male'] ? "checked" : null; ?>> <?= $lang[$code . '_' . "Male"]?>
                                    <input type="checkbox" name="female" id="screening_female" <?= $diagnose['female'] ? "checked" : null; ?>> <?= $lang[$code . '_' . "Female"]?>
                                </div>
                                <div class="form-group" id="pregnant">
                                    <label for="video"> <?= $lang[$code . '_' . "Female Status"]?></label>
                                    <input type="checkbox" name="pregnant" <?=  $diagnose['pregnant'] ? "checked" : null; ?>> <?= $lang[$code . '_' . "Pregnant"]?>
                                    <input type="checkbox" name="not_pregnant" <?= $diagnose['not_pregnant'] ? "checked" : null; ?>> <?= $lang[$code . '_' . "Not Pregnant"]?>
                                </div>
                                <div class="form-group ">
                                    <label for="video"> <?= $lang[$code . '_' . "Smoke"]?></label>
                                    <input type="checkbox" name="smoking" <?= $diagnose['smoking'] ? "checked" : null; ?>> <?= $lang[$code . '_' . "Smoking"]?>
                                    <input type="checkbox" name="not_smoking" <?= $diagnose['not_smoking'] ? "checked" : null; ?>> <?= $lang[$code . '_' . "Not Smoking"]?>
                                </div>
                                <div class="form-group ">
                                    <label for="activity"> <?= $lang[$code . '_' . "Sexual Activity"]?></label>
                                    <input type="checkbox" name="regular" <?= $diagnose['regular'] ? "checked" : null; ?>> <?= $lang[$code . '_' . "Regular"]?>
                                    <input type="checkbox" name="not_regular" <?= $diagnose['not_regular'] ? "checked" : null; ?>> <?= $lang[$code . '_' . "Not Regular"]?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="video"> <?= $lang[$code . '_' . "Video"]?></label>
                            <input type="text" name="video" class="form-control" id="video" placeholder=" <?= $lang[$code . '_' . "Video"]?>" value="<?= h($diagnose['video']);?>" >
                        </div>

                        <div class="form-group">
                            <label for="keywords"> <?= $lang[$code . '_' . "Title"]?></label>
                            <input type="text" name="title" class="form-control" id="title" placeholder=" <?= $lang[$code . '_' . "Title"]?>" value="<?=  h($diagnose['title']);  ?>" >
                        </div>
                        <div class="form-group">
                            <label for="keywords"> <?= $lang[$code . '_' . "Keywords"]?></label>
                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder=" <?= $lang[$code . '_' . "Keywords"]?>" value="<?= h($diagnose['keywords']);  ?>" >
                        </div>
                        <div class="form-group">
                            <label for="description"> <?= $lang[$code . '_' . "Description"]?></label>
                            <input type="text" name="description" class="form-control" id="description" placeholder=" <?= $lang[$code . '_' . "Description"]?>" value="<?= h($diagnose['description']); ?>" >
                        </div>
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?= $diagnose['id']; ?>">
                        <button type="submit" class="btn btn-success"> <?= $lang[$code . '_' . "Save"]?></button>
                    </div>
                </form>


            </div>
        </div>
    </div>

</section>
<!-- /.content -->
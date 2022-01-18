<?php 
// colors
  $bg_green = "background:#5ddd35;";
  $bg_dark_green = "background:#08a731;";
  $bg_yellow = "background:yellow;";
  $bg_blue = "background:lightblue;";
  $bg_l_blue = "background:lightslateblue;";
  // width
  $w30 = "width:25px;";
  $w60 = "width:60px;";
  $w50 = "width:50px;";
  $w200 = "width:200px;";
  $w800 = "width:800px;";

  // align
  $a_c = "text-align:center;vertical-align:center;";

  // font
  $f_bold = "font-weight:500;";
  $f_size = "font-size:12px";

?>

<table>
    <thead>
    <tr>
        <th style={{ $a_c.$f_bold.$f_size }}>№ ст.</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Населений пункт</th>
        <th style={{ $a_c.$f_bold.$f_size }}>P (W)</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Антена SAT1</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Антена SAT2</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Приймач 31</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Приймач 32</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Приймач 33</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Приймач 34</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Передавач 21</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Передавач 22</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Передавач 23</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Передавач 25</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Мультиплексор</th>
        <th style={{ $a_c.$f_bold.$f_size }}>GPS1 ED170</th>
        <th style={{ $a_c.$f_bold.$f_size }}>GPS2 ED170</th>
        <th style={{ $a_c.$f_bold.$f_size }}>UPS PW9135</th>
        <th style={{ $a_c.$f_bold.$f_size }}>t телекомстійки</th>
        <th style={{ $a_c.$f_bold.$f_size }}>ASA-5505</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Catalist 3560</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Ком. консолей</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Сервер</th>
        <th style={{ $a_c.$f_bold.$f_size }}>ТЕЛЕСКАНЕР</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Регіон. Канали</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Інше</th>
        <th style={{ $a_c.$f_bold.$f_size }}>Зв'зок</th>
        <th style={{ $a_c.$f_bold.$f_size}}>Опис та інше</th>
    </tr>
    </thead>
    <tbody>
    @foreach($stations as $station)
        <?php if($station['name'] == 'АР Крим') continue;  ?>
        <tr>
         @if (isset($station['district']))
          <td style={{ $bg_blue }}></td>
          <td style={{ $bg_blue.$f_bold.$f_size }}>{{ $station['name'] }}</td>
          @for ($i=0; $i<25; $i++)
            <td style={{ $bg_blue }}></td>
          @endfor
         @else
          <td style={{ $bg_green.$w50.$a_c.$f_bold }}>{{ $station['number'] }}</td>
          <td style={{ $bg_green.$w200.$f_bold }}>{{ $station['name'] }}</td>
          <td style={{ $bg_green.$w60.$a_c.$f_bold }}>{{ $station['power'] }}</td>

          {{-- content --}}
          <td @if ($station['sat1']) style={{ $bg_yellow.$w30.$a_c.$f_bold }} @else style={{ $bg_blue.$w30.$a_c.$f_bold }} @endif>S</td>
          <td @if ($station['sat2']) style={{ $bg_yellow.$w30.$a_c.$f_bold }} @else style={{ $bg_l_blue.$w30.$a_c.$f_bold  }} @endif>S</td>
          <td @if ($station['pvr1']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['pvr2']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['pvr3']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['pvr4']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['trans1']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['trans2']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['trans3']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['trans4']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['mux']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['gps1']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['gps2']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['ups']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['temp']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['asa']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['cisco']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['console']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['server']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['telescaner']) style={{ $bg_yellow.$w30.$a_c }} @else style={{ $bg_dark_green.$w30.$a_c }} @endif>32</td>
          <td @if ($station['reg_channel']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['other']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td @if ($station['communication']) style={{ $bg_yellow.$w30 }} @else style={{ $bg_green.$w30 }} @endif></td>
          <td style={{ $w800 }}>
            <?php $num = 1; ?>
            @foreach ($station as $key=>$val)
              @if (in_array($key, ['number', 'name', 'power']) || !$val)
                <?php continue; ?>
              @else
                @if ($num != 1) <br> @endif{{ $num.'.'.$val.' ('.App\Exports\ConditionExport::arrName[$key].').'}}
                <?php $num++; ?>
              @endif
            @endforeach
          </td>
         @endif
      </tr>
        
        
    @endforeach
    </tbody>
</table>
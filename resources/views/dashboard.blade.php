<x-app-layout>
    <!--IMPORTANTE NAO REMOVA O x-slot no front-end não vai aparece
    o componente navigation
    -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
  <h6 class="fw-semibold mb-0"> {{ __('Dashboard') }}</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="{{route("dashboard")}}" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
    {{ __('Dashboard') }}
      </a>
    </li>
   
    
  </ul>
</div>
<!--mini graficos-->
<div class="col-xxl-8">
  <div class="row gy-4">
          <div class="col-xxl-4 col-sm-6">
            <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-1">
              <div class="card-body p-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                  
                    <div class="d-flex align-items-center gap-2">
                      <span class="mb-0 w-48-px h-48-px bg-primary-600 flex-shrink-0 text-white d-flex justify-content-center align-items-center rounded-circle h6 mb-0">
                         <iconify-icon icon="tabler:credit-card"></iconify-icon>
                      </span>
                      <div>
                        <span class="mb-2 fw-medium text-secondary-light text-sm">Pagamentos</span>
                        <h6 class="fw-semibold">R$ {{number_format($pagamentoValor, 2,"," , ".")}}</h6>
                      </div>
                    </div>
                  
                    <div id="new-user-chart" class="remove-tooltip-title rounded-tooltip-value" style="min-height: 42px;"><div id="apexcharts8be2kmzvj" class="apexcharts-canvas apexcharts8be2kmzvj apexcharts-theme-light" style="width: 80px; height: 42px;"><svg id="SvgjsSvg1680" width="80" height="42" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="80" height="42"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 21px;"></div></foreignObject><rect id="SvgjsRect1685" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1718" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1682" class="apexcharts-inner apexcharts-graphical" transform="translate(0, -3)"><defs id="SvgjsDefs1681"><clipPath id="gridRectMask8be2kmzvj"><rect id="SvgjsRect1687" width="86" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask8be2kmzvj"></clipPath><clipPath id="nonForecastMask8be2kmzvj"></clipPath><clipPath id="gridRectMarkerMask8be2kmzvj"><rect id="SvgjsRect1688" width="84" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1693" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1694" stop-opacity="0.75" stop-color="rgba(72,127,255,0.75)" offset="0"></stop><stop id="SvgjsStop1695" stop-opacity="0.3" stop-color="#487fff00" offset="1"></stop><stop id="SvgjsStop1696" stop-opacity="0.3" stop-color="#487fff00" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1686" x1="49.5" y1="0" x2="49.5" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="49.5" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1699" class="apexcharts-grid"><g id="SvgjsG1700" class="apexcharts-gridlines-horizontal"></g><g id="SvgjsG1701" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1704" x1="0" y1="45" x2="80" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1703" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1689" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1690" class="apexcharts-series" seriesName="series1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1697" d="M 0 45 L 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30C 80 30 80 30 80 45M 80 30z" fill="url(#SvgjsLinearGradient1693)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask8be2kmzvj)" pathTo="M 0 45 L 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30C 80 30 80 30 80 45M 80 30z" pathFrom="M -1 90 L -1 90 L 10 90 L 20 90 L 30 90 L 40 90 L 50 90 L 60 90 L 70 90 L 80 90"></path><path id="SvgjsPath1698" d="M 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30" fill="none" fill-opacity="1" stroke="#487fff" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask8be2kmzvj)" pathTo="M 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30" pathFrom="M -1 90 L -1 90 L 10 90 L 20 90 L 30 90 L 40 90 L 50 90 L 60 90 L 70 90 L 80 90" fill-rule="evenodd"></path><g id="SvgjsG1691" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1722" r="0" cx="50" cy="25.5" class="apexcharts-marker whiakkn78 no-pointer-events" stroke="#ffffff" fill="#487fff" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1692" class="apexcharts-datalabels" data:realIndex="0"></g></g><g id="SvgjsG1702" class="apexcharts-grid-borders"></g><line id="SvgjsLine1705" x1="0" y1="0" x2="80" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1706" x1="0" y1="0" x2="80" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1707" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1708" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1719" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1720" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1721" class="apexcharts-point-annotations"></g></g></svg><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 5px; top: 2px;"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">Jun 2025</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">series1: </span><span class="apexcharts-tooltip-text-y-value">43</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                </div>
                <p class="text-sm mb-0">Queda <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">-2</span> no mês</p>
              </div>
            </div>
          </div>
          
          <div class="col-xxl-4 col-sm-6">
            <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-2">
              <div class="card-body p-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                  
                    <div class="d-flex align-items-center gap-2">
                      <span class="mb-0 w-48-px h-48-px bg-success-main flex-shrink-0 text-white d-flex justify-content-center align-items-center rounded-circle h6">
                        <iconify-icon icon="mingcute:user-follow-fill" class="icon"></iconify-icon>  
                      </span>
                      <div>
                        <span class="mb-2 fw-medium text-secondary-light text-sm">Receitas</span>
                        <h6 class="fw-semibold">R$ {{number_format($Receita, 2, ",", ".")}}</h6>
                      </div>
                    </div>
                  
                    <div id="active-user-chart" class="remove-tooltip-title rounded-tooltip-value" style="min-height: 42px;"><div id="apexcharts189n694rl" class="apexcharts-canvas apexcharts189n694rl apexcharts-theme-light" style="width: 80px; height: 42px;"><svg id="SvgjsSvg1724" width="80" height="42" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="80" height="42"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 21px;"></div></foreignObject><rect id="SvgjsRect1729" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1762" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1726" class="apexcharts-inner apexcharts-graphical" transform="translate(0, -3)"><defs id="SvgjsDefs1725"><clipPath id="gridRectMask189n694rl"><rect id="SvgjsRect1731" width="86" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask189n694rl"></clipPath><clipPath id="nonForecastMask189n694rl"></clipPath><clipPath id="gridRectMarkerMask189n694rl"><rect id="SvgjsRect1732" width="84" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1737" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1738" stop-opacity="0.75" stop-color="rgba(69,179,105,0.75)" offset="0"></stop><stop id="SvgjsStop1739" stop-opacity="0.3" stop-color="#45b36900" offset="1"></stop><stop id="SvgjsStop1740" stop-opacity="0.3" stop-color="#45b36900" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1730" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1743" class="apexcharts-grid"><g id="SvgjsG1744" class="apexcharts-gridlines-horizontal"></g><g id="SvgjsG1745" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1748" x1="0" y1="45" x2="80" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1747" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1733" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1734" class="apexcharts-series" seriesName="series1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1741" d="M 0 45 L 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30C 80 30 80 30 80 45M 80 30z" fill="url(#SvgjsLinearGradient1737)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask189n694rl)" pathTo="M 0 45 L 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30C 80 30 80 30 80 45M 80 30z" pathFrom="M -1 90 L -1 90 L 10 90 L 20 90 L 30 90 L 40 90 L 50 90 L 60 90 L 70 90 L 80 90"></path><path id="SvgjsPath1742" d="M 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30" fill="none" fill-opacity="1" stroke="#45b369" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask189n694rl)" pathTo="M 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30" pathFrom="M -1 90 L -1 90 L 10 90 L 20 90 L 30 90 L 40 90 L 50 90 L 60 90 L 70 90 L 80 90" fill-rule="evenodd"></path><g id="SvgjsG1735" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1766" r="0" cx="0" cy="0" class="apexcharts-marker wdf5ffeq8 no-pointer-events" stroke="#ffffff" fill="#45b369" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1736" class="apexcharts-datalabels" data:realIndex="0"></g></g><g id="SvgjsG1746" class="apexcharts-grid-borders"></g><line id="SvgjsLine1749" x1="0" y1="0" x2="80" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1750" x1="0" y1="0" x2="80" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1751" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1752" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1763" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1764" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1765" class="apexcharts-point-annotations"></g></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                </div>
                <p class="text-sm mb-0">Aumento <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+5%</span>no mês</p>
              </div>
            </div>
          </div>
          
          <div class="col-xxl-4 col-sm-6">
            <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-3">
              <div class="card-body p-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                  
                    <div class="d-flex align-items-center gap-2">
                      <span class="mb-0 w-48-px h-48-px bg-yellow text-white flex-shrink-0 d-flex justify-content-center align-items-center rounded-circle h6">
                        <iconify-icon icon="iconamoon:discount-fill" class="icon"></iconify-icon>  
                      </span>
                      <div>
                        <span class="mb-2 fw-medium text-secondary-light text-sm">Depesas</span>
                        <h6 class="fw-semibold">R$ {{number_format($valorPagoDepesaPaga, 2, ",",".")}}</h6>
                      </div>
                    </div>
                  
                    <div id="total-sales-chart" class="remove-tooltip-title rounded-tooltip-value" style="min-height: 42px;"><div id="apexchartsl32a7s12" class="apexcharts-canvas apexchartsl32a7s12 apexcharts-theme-light" style="width: 80px; height: 42px;"><svg id="SvgjsSvg1768" width="80" height="42" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="80" height="42"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 21px;"></div></foreignObject><rect id="SvgjsRect1773" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1806" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1770" class="apexcharts-inner apexcharts-graphical" transform="translate(0, -3)"><defs id="SvgjsDefs1769"><clipPath id="gridRectMaskl32a7s12"><rect id="SvgjsRect1775" width="86" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskl32a7s12"></clipPath><clipPath id="nonForecastMaskl32a7s12"></clipPath><clipPath id="gridRectMarkerMaskl32a7s12"><rect id="SvgjsRect1776" width="84" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1781" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1782" stop-opacity="0.75" stop-color="rgba(244,148,30,0.75)" offset="0"></stop><stop id="SvgjsStop1783" stop-opacity="0.3" stop-color="#f4941e00" offset="1"></stop><stop id="SvgjsStop1784" stop-opacity="0.3" stop-color="#f4941e00" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1774" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1787" class="apexcharts-grid"><g id="SvgjsG1788" class="apexcharts-gridlines-horizontal"></g><g id="SvgjsG1789" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1792" x1="0" y1="45" x2="80" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1791" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1777" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1778" class="apexcharts-series" seriesName="series1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1785" d="M 0 45 L 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30C 80 30 80 30 80 45M 80 30z" fill="url(#SvgjsLinearGradient1781)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskl32a7s12)" pathTo="M 0 45 L 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30C 80 30 80 30 80 45M 80 30z" pathFrom="M -1 90 L -1 90 L 10 90 L 20 90 L 30 90 L 40 90 L 50 90 L 60 90 L 70 90 L 80 90"></path><path id="SvgjsPath1786" d="M 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30" fill="none" fill-opacity="1" stroke="#f4941e" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskl32a7s12)" pathTo="M 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30" pathFrom="M -1 90 L -1 90 L 10 90 L 20 90 L 30 90 L 40 90 L 50 90 L 60 90 L 70 90 L 80 90" fill-rule="evenodd"></path><g id="SvgjsG1779" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1810" r="0" cx="0" cy="0" class="apexcharts-marker wsfdpe7ta no-pointer-events" stroke="#ffffff" fill="#f4941e" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1780" class="apexcharts-datalabels" data:realIndex="0"></g></g><g id="SvgjsG1790" class="apexcharts-grid-borders"></g><line id="SvgjsLine1793" x1="0" y1="0" x2="80" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1794" x1="0" y1="0" x2="80" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1795" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1796" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1807" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1808" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1809" class="apexcharts-point-annotations"></g></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                </div>
                <p class="text-sm mb-0">Variação <span class="bg-danger-focus px-1 rounded-2 fw-medium text-danger-main text-sm">-2%</span> no mês</p>
              </div>
            </div>
          </div>
          
          <div class="col-xxl-4 col-sm-6">
            <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-4">
              <div class="card-body p-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                  
                    <div class="d-flex align-items-center gap-2">
                      <span class="mb-0 w-48-px h-48-px bg-purple text-white flex-shrink-0 d-flex justify-content-center align-items-center rounded-circle h6">
                        <iconify-icon icon="mdi:message-text" class="icon"></iconify-icon>  
                      </span>
                      <div>
                        <span class="mb-2 fw-medium text-secondary-light text-sm">Licitações</span>
                        <h6 class="fw-semibold">{{$processo}} Processos</h6>
                      </div>
                    </div>
                  
                    <div id="conversion-user-chart" class="remove-tooltip-title rounded-tooltip-value" style="min-height: 42px;"><div id="apexchartsk2twwvqh" class="apexcharts-canvas apexchartsk2twwvqh apexcharts-theme-light" style="width: 80px; height: 42px;"><svg id="SvgjsSvg1812" width="80" height="42" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="80" height="42"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 21px;"></div></foreignObject><rect id="SvgjsRect1817" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1850" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1814" class="apexcharts-inner apexcharts-graphical" transform="translate(0, -3)"><defs id="SvgjsDefs1813"><clipPath id="gridRectMaskk2twwvqh"><rect id="SvgjsRect1819" width="86" height="47" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskk2twwvqh"></clipPath><clipPath id="nonForecastMaskk2twwvqh"></clipPath><clipPath id="gridRectMarkerMaskk2twwvqh"><rect id="SvgjsRect1820" width="84" height="49" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1825" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1826" stop-opacity="0.75" stop-color="rgba(130,82,233,0.75)" offset="0"></stop><stop id="SvgjsStop1827" stop-opacity="0.3" stop-color="#8252e900" offset="1"></stop><stop id="SvgjsStop1828" stop-opacity="0.3" stop-color="#8252e900" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1818" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1831" class="apexcharts-grid"><g id="SvgjsG1832" class="apexcharts-gridlines-horizontal"></g><g id="SvgjsG1833" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1836" x1="0" y1="45" x2="80" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1835" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1821" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1822" class="apexcharts-series" seriesName="series1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1829" d="M 0 45 L 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30C 80 30 80 30 80 45M 80 30z" fill="url(#SvgjsLinearGradient1825)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskk2twwvqh)" pathTo="M 0 45 L 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30C 80 30 80 30 80 45M 80 30z" pathFrom="M -1 90 L -1 90 L 10 90 L 20 90 L 30 90 L 40 90 L 50 90 L 60 90 L 70 90 L 80 90"></path><path id="SvgjsPath1830" d="M 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30" fill="none" fill-opacity="1" stroke="#8252e9" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskk2twwvqh)" pathTo="M 0 37.5C 3.5 37.5 6.5 22.5 10 22.5C 13.5 22.5 16.5 33 20 33C 23.5 33 26.5 28.5 30 28.5C 33.5 28.5 36.5 36 40 36C 43.5 36 46.5 25.5 50 25.5C 53.5 25.5 56.5 34.5 60 34.5C 63.5 34.5 66.5 7.5 70 7.5C 73.5 7.5 76.5 30 80 30" pathFrom="M -1 90 L -1 90 L 10 90 L 20 90 L 30 90 L 40 90 L 50 90 L 60 90 L 70 90 L 80 90" fill-rule="evenodd"></path><g id="SvgjsG1823" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1854" r="0" cx="0" cy="0" class="apexcharts-marker wim6fgdfi no-pointer-events" stroke="#ffffff" fill="#8252e9" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1824" class="apexcharts-datalabels" data:realIndex="0"></g></g><g id="SvgjsG1834" class="apexcharts-grid-borders"></g><line id="SvgjsLine1837" x1="0" y1="0" x2="80" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1838" x1="0" y1="0" x2="80" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1839" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1840" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1851" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1852" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1853" class="apexcharts-point-annotations"></g></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                </div>
                <p class="text-sm mb-0">Aumento  <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+7%</span> no mês</p>
              </div>
            </div>
          </div>
          
          
          
        </div>
</div>
<!--mini graficos  end-->
<br>
<!--Grafico redondo-->
<div class="col-xxl-4">
  <div class="row gy-4">
          <div class="col-xxl-12 col-sm-6">
            <div class="card h-100 radius-8 border-0">
              <div class="card-body p-24">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                  <h6 class="mb-2 fw-bold text-lg">Movimento Bancaria</h6>
                  <div class="">
                    <select class="form-select form-select-sm w-auto bg-base border text-secondary-light radius-8">
                      <option>Mes</option>
                      <option>Ano</option>
                      <option>Semana</option>
                      
                    </select>
                  </div>
                </div>
                
                <div class="mt-3">
                  
                  <div class="d-flex align-items-center justify-content-between gap-3 mb-12">
                    <div class="d-flex align-items-center">
                      <span class="text-xxl line-height-1 d-flex align-content-center flex-shrink-0 text-orange">
                        <iconify-icon icon="majesticons:mail" class="icon"></iconify-icon>
                      </span>
                      <span class="text-primary-light fw-medium text-sm ps-12">Contrato</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 w-100">
                      <div class="w-100 max-w-66 ms-auto">
                        <div class="progress progress-sm rounded-pill" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-orange rounded-pill" style="width: 80%;"></div>
                        </div>
                      </div>
                      <span class="text-secondary-light font-xs fw-semibold">80%</span>
                    </div>
                  </div>
                  
                  <div class="d-flex align-items-center justify-content-between gap-3 mb-12">
                    <div class="d-flex align-items-center">
                      <span class="text-xxl line-height-1 d-flex align-content-center flex-shrink-0 text-success-main">
                        <iconify-icon icon="eva:globe-2-fill" class="icon"></iconify-icon>
                      </span>
                      <span class="text-primary-light fw-medium text-sm ps-12">Movimento Bancaria</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 w-100">
                      <div class="w-100 max-w-66 ms-auto">
                        <div class="progress progress-sm rounded-pill" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-success-main rounded-pill" style="width: 60%;"></div>
                        </div>
                      </div>
                      <span class="text-secondary-light font-xs fw-semibold">60%</span>
                    </div>
                  </div>
                  
                  <div class="d-flex align-items-center justify-content-between gap-3 mb-12">
                    <div class="d-flex align-items-center">
                      <span class="text-xxl line-height-1 d-flex align-content-center flex-shrink-0 text-info-main">
                      <iconify-icon icon="mdi:trending-up"></iconify-icon>
                      </span>
                      <span class="text-primary-light fw-medium text-sm ps-12">Cargos</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 w-100">
                      <div class="w-100 max-w-66 ms-auto">
                        <div class="progress progress-sm rounded-pill" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-info-main rounded-pill" style="width: 49%;"></div>
                        </div>
                      </div>
                      <span class="text-secondary-light font-xs fw-semibold">49%</span>
                    </div>
                  </div>
                  
                  <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center">
                      <span class="text-xxl line-height-1 d-flex align-content-center flex-shrink-0 text-indigo">
                        <iconify-icon icon="fluent:location-off-20-filled" class="icon"></iconify-icon>
                      </span>
                      <span class="text-primary-light fw-medium text-sm ps-12">Servidores</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 w-100">
                      <div class="w-100 max-w-66 ms-auto">
                        <div class="progress progress-sm rounded-pill" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-indigo rounded-pill" style="width: 70%;"></div>
                        </div>
                      </div>
                      <span class="text-secondary-light font-xs fw-semibold">70%</span>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
          <div class="col-xxl-12 col-sm-6">
            <div class="card h-100 radius-8 border-0 overflow-hidden">
              <div class="card-body p-24">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                  <h6 class="mb-2 fw-bold text-lg">Customer Overview</h6>
                  <div class="">
                    <select class="form-select form-select-sm w-auto bg-base border text-secondary-light radius-8">
                     <option>Mes</option>
                      <option>Ano</option>
                      <option>Semana</option>
                    </select>
                  </div>
                </div>

                <div class="d-flex flex-wrap align-items-center mt-3"> 
                  <ul class="flex-shrink-0">
                    <li class="d-flex align-items-center gap-2 mb-28">
                      <span class="w-12-px h-12-px rounded-circle bg-success-main"></span>
                      <span class="text-secondary-light text-sm fw-medium">Total: 500</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 mb-28">
                      <span class="w-12-px h-12-px rounded-circle bg-warning-main"></span>
                      <span class="text-secondary-light text-sm fw-medium">New: 500</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                      <span class="w-12-px h-12-px rounded-circle bg-primary-600"></span>
                      <span class="text-secondary-light text-sm fw-medium">Active: 1500</span>
                    </li>
                  </ul>
                  <div id="donutChart" class="flex-grow-1 apexcharts-tooltip-z-none title-style circle-none" style="min-height: 311px;"><div id="apexchartsrqqjxeqs" class="apexcharts-canvas apexchartsrqqjxeqs apexcharts-theme-light" style="width: 346px; height: 311px;"><svg id="SvgjsSvg2986" width="346" height="311" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="346" height="311"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div></foreignObject><g id="SvgjsG2988" class="apexcharts-inner apexcharts-graphical" transform="translate(23, 10)"><defs id="SvgjsDefs2987"><clipPath id="gridRectMaskrqqjxeqs"><rect id="SvgjsRect2989" width="304" height="300" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskrqqjxeqs"></clipPath><clipPath id="nonForecastMaskrqqjxeqs"></clipPath><clipPath id="gridRectMarkerMaskrqqjxeqs"><rect id="SvgjsRect2990" width="304" height="304" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG2991" class="apexcharts-pie"><g id="SvgjsG2992" transform="translate(30, 30) scale(0.8)"><circle id="SvgjsCircle2993" r="102.4390243902439" cx="150" cy="150" fill="transparent"></circle><g id="SvgjsG2994" class="apexcharts-slices"><g id="SvgjsG2995" class="apexcharts-series apexcharts-pie-series" seriesName="Active" rel="1" data:realIndex="0"><path id="SvgjsPath2996" d="M 3.6585365853658516 149.99999999999997 A 146.34146341463415 146.34146341463415 0 0 1 76.82926829268295 23.264575055935794 L 98.78048780487808 61.285202539155065 A 102.4390243902439 102.4390243902439 0 0 0 47.5609756097561 150 L 3.6585365853658516 149.99999999999997 z" fill="rgba(69,179,105,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="60" data:startAngle="-90" data:strokeWidth="0" data:value="500" data:pathOrig="M 3.6585365853658516 149.99999999999997 A 146.34146341463415 146.34146341463415 0 0 1 76.82926829268295 23.264575055935794 L 98.78048780487808 61.285202539155065 A 102.4390243902439 102.4390243902439 0 0 0 47.5609756097561 150 L 3.6585365853658516 149.99999999999997 z"></path></g><g id="SvgjsG2997" class="apexcharts-series apexcharts-pie-series" seriesName="New" rel="2" data:realIndex="1"><path id="SvgjsPath2998" d="M 76.82926829268295 23.264575055935794 A 146.34146341463415 146.34146341463415 0 0 1 223.1707317073171 23.264575055935808 L 201.21951219512198 61.285202539155065 A 102.4390243902439 102.4390243902439 0 0 0 98.78048780487808 61.285202539155065 L 76.82926829268295 23.264575055935794 z" fill="rgba(255,159,41,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="60" data:startAngle="-30" data:strokeWidth="0" data:value="500" data:pathOrig="M 76.82926829268295 23.264575055935794 A 146.34146341463415 146.34146341463415 0 0 1 223.1707317073171 23.264575055935808 L 201.21951219512198 61.285202539155065 A 102.4390243902439 102.4390243902439 0 0 0 98.78048780487808 61.285202539155065 L 76.82926829268295 23.264575055935794 z"></path></g><g id="SvgjsG2999" class="apexcharts-series apexcharts-pie-series" seriesName="Total" rel="3" data:realIndex="2"><path id="SvgjsPath3000" d="M 223.1707317073171 23.264575055935808 A 146.34146341463415 146.34146341463415 0 0 1 296.3414611857262 149.97445859644193 L 252.43902283000835 149.98212101750934 A 102.4390243902439 102.4390243902439 0 0 0 201.21951219512198 61.285202539155065 L 223.1707317073171 23.264575055935808 z" fill="rgba(72,127,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="60" data:startAngle="30" data:strokeWidth="0" data:value="500" data:pathOrig="M 223.1707317073171 23.264575055935808 A 146.34146341463415 146.34146341463415 0 0 1 296.3414611857262 149.97445859644193 L 252.43902283000835 149.98212101750934 A 102.4390243902439 102.4390243902439 0 0 0 201.21951219512198 61.285202539155065 L 223.1707317073171 23.264575055935808 z"></path></g></g></g><g id="SvgjsG3001" class="apexcharts-datalabels-group" transform="translate(30, 30) scale(0.8)"><text id="SvgjsText3002" font-family="Helvetica, Arial, sans-serif" x="150" y="140" text-anchor="middle" dominant-baseline="auto" font-size="16px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Customer Report</text><text id="SvgjsText3003" font-family="Helvetica, Arial, sans-serif" x="150" y="176" text-anchor="middle" dominant-baseline="auto" font-size="20px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">1500</text></g></g><line id="SvgjsLine3004" x1="0" y1="0" x2="300" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine3005" x1="0" y1="0" x2="300" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-tooltip apexcharts-theme-dark" style="left: 223.141px; top: 119.281px;"><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex; background-color: rgb(72, 127, 255);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(72, 127, 255); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Total: </span><span class="apexcharts-tooltip-text-y-value">500</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2; display: none; background-color: rgb(72, 127, 255);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(72, 127, 255); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Total: </span><span class="apexcharts-tooltip-text-y-value">500</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3; display: none; background-color: rgb(72, 127, 255);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(72, 127, 255); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Total: </span><span class="apexcharts-tooltip-text-y-value">500</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
</div>
</x-app-layout>

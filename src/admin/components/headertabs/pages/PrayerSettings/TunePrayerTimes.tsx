import { time } from 'console';
import * as React from 'react';
import { useSelector,useDispatch } from 'react-redux';
import styled from 'styled-components';
import { RootState } from '../../../../../app/store';
import { useGetprayerSettingsMetaAPIQuery } from '../../../../api/prayerSettingsMetaAPI';
import { useGetPrayerTimeTableQuery, useUpdatePrayerTimeTableMutation } from '../../../../api/prayerTimeTableApi';
import { Calender } from '../../../../features/calendars/prayerTimeCalendar';
import { AsrChecked, HigherChecked, LocationChecked, MedothChecked, MidnightChecked } from '../../../../features/search/searchTownCity';
import { PrayTimes } from '../../../../model/PrayTimes';
import FPInput from '../../../elements/FPInput';
import FPTablePrayerTime from './FPTablePrayerTime';
import MasjidJamaah from '../../../../model/MasjidJamaah';
export interface ITunePrayerTimesProps {}

export function TunePrayerTimes(props: ITunePrayerTimesProps) {
const [updateTimeTable] =  useUpdatePrayerTimeTableMutation();
const { data: getprayersettingMeta } = useGetprayerSettingsMetaAPIQuery('fp_prayersettings_meta');

  const { TPTimeImsak, TPTimeFajr, TPTimeSunrise, TPTimeZhuhr, TPTimeAsr, TPTimeSunset, TPTimeMaghrib, TPTimeIsha, TPTimeMidnight } = useSelector((state: RootState) => state.TunePrayerTime);
  const { asrChecked, monthChecked, midnightChecked, locationChecked, higherChecked, medothChecked, ListCity, CalcMethods, HigherLats, MidnightMode, AsrMedoths, CityTown } = useSelector((state: RootState) => state.searchtowncity);
  const {data:timetable,isSuccess:success,isLoading,isFetching,isError} = useGetPrayerTimeTableQuery('fp_prayertimetable');

 
  const [CurrentDate, setCurrentDate] = React.useState(new Date().getDate())
 //Imsak
  if (localStorage.getItem('Imsak') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Imsak')[0]?.['meta-key'] === 'Imsak') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Imsak')[0]?.value;
    
    localStorage.setItem('Imsak', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Imsak')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Imsak')[0]?.['meta-key'] === 'Imsak'){
    localStorage.setItem('Imsak', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Imsak')[0]?.value);

  }
 //Fajr
  if (localStorage.getItem('Fajr') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Fajr')[0]?.['meta-key'] === 'Fajr') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Fajr')[0]?.value;
    
    localStorage.setItem('Fajr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Fajr')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Fajr')[0]?.['meta-key'] === 'Fajr'){
    localStorage.setItem('Fajr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Fajr')[0]?.value);

  }
 //Sunrise
  if (localStorage.getItem('Sunrise') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunrise')[0]?.['meta-key'] === 'Sunrise') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunrise')[0]?.value;
    
    localStorage.setItem('Sunrise', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunrise')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunrise')[0]?.['meta-key'] === 'Sunrise'){
    localStorage.setItem('Sunrise', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunrise')[0]?.value);

  }
  //Zhuhr
  if (localStorage.getItem('Zhuhr') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Zhuhr')[0]?.['meta-key'] === 'Zhuhr') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Zhuhr')[0]?.value;
    
    localStorage.setItem('Zhuhr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Zhuhr')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Zhuhr')[0]?.['meta-key'] === 'Zhuhr'){
    localStorage.setItem('Zhuhr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Zhuhr')[0]?.value);

  }
  //Asr
  if (localStorage.getItem('Asr') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Asr')[0]?.['meta-key'] === 'Asr') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Asr')[0]?.value;
    
    localStorage.setItem('Asr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Asr')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Asr')[0]?.['meta-key'] === 'Asr'){
    localStorage.setItem('Asr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Asr')[0]?.value);

  }
  //Sunset
  if (localStorage.getItem('Sunset') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunset')[0]?.['meta-key'] === 'Sunset') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunset')[0]?.value;
    
    localStorage.setItem('Sunset', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunset')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunset')[0]?.['meta-key'] === 'Sunset'){
    localStorage.setItem('Sunset', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Sunset')[0]?.value);

  }
  //Maghrib
  if (localStorage.getItem('Maghrib') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Maghrib')[0]?.['meta-key'] === 'Maghrib') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Maghrib')[0]?.value;
    
    localStorage.setItem('Maghrib', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Maghrib')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Maghrib')[0]?.['meta-key'] === 'Maghrib'){
    localStorage.setItem('Maghrib', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Maghrib')[0]?.value);

  }
  //Isha
  if (localStorage.getItem('Isha') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Isha')[0]?.['meta-key'] === 'Isha') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Isha')[0]?.value;
    
    localStorage.setItem('Isha', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Isha')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Isha')[0]?.['meta-key'] === 'Isha'){
    localStorage.setItem('Isha', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Isha')[0]?.value);

  }
  //Midnight
  if (localStorage.getItem('Midnight') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Midnight')[0]?.['meta-key'] === 'Midnight') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Midnight')[0]?.value;
    
    localStorage.setItem('Midnight', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Midnight')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Midnight')[0]?.['meta-key'] === 'Midnight'){
    localStorage.setItem('Midnight', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Midnight')[0]?.value);

  }
  
  var t0 = performance.now();


  
  const dispatch = useDispatch()
  // const [time, setTimes] = React.useState<string[]>();
  React.useEffect(()=>{
    // dispatch(AsrChecked(new Date().getMinutes()))

},[new Date().getMinutes()])
  const prayTimes = PrayTimes();
  

  // return month full name
  function monthFullName(month: number) {
    var monthName = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    return monthName[month];
  }
  const GenerateCalender = () => {

    const higherLat = JSON.parse( localStorage.getItem('higherlatitude') as string)?.method;
    const asrculc = JSON.parse( localStorage.getItem('asrcalculation')as string)?.method;
    const culcmethod = JSON.parse( localStorage.getItem('calcmedthod')as string)?.method;
    const midnightculc = JSON.parse( localStorage.getItem('midnightcalculation')as string)?.method;
    // updatePrayerTime({id: '1', month: monthChecked, city: locationChecked.name})
    // dispatch(MonthChecked(monthChecked));
    prayTimes.setMethod(culcmethod);
    prayTimes.adjust({
      asr: asrculc,
      highLats: higherLat,
      midnight: midnightculc,
    });
    prayTimes.tune({
      imsak: Number(TPTimeImsak),
      fajr: Number(localStorage.getItem('Fajr')),
      dhuhr: Number(TPTimeZhuhr),
      asr: Number(TPTimeAsr),
      maghrib: Number(TPTimeMaghrib),
      isha: Number(TPTimeIsha),
      midnight: Number(TPTimeMidnight),
    });
    const currentDate = new Date();
    // const dc = currentDate.setMonth(currentDate.getMonth() + 1 * 0);
    let year = currentDate.getFullYear();
    let month = currentDate.getMonth();

    let day = currentDate.getDate();

    let title = day + ' ' + monthFullName(Number(JSON.parse(localStorage?.getItem('monthselect') as string)?.monthNum || new Date().getMonth())) + ' ' + year;

    let date = new Date(year, Number(JSON.parse(localStorage?.getItem('monthselect') as string)?.monthNum || new Date().getMonth()), 1);
    let endDate = new Date(year, Number(JSON.parse(localStorage?.getItem('monthselect') as string)?.monthNum || new Date().getMonth()) + 1, 1);

    const dataTable: string[] = [];
    while (date < endDate) {
      let times = prayTimes.getTimes(date, [Number(JSON.parse(localStorage?.getItem('location') as string)?.lat ), Number(JSON.parse(localStorage?.getItem('location') as string)?.lng )], 'auto', 'auto', '24h');
      dataTable.push(times);

      times.day = date.getDate().toString();
      times.date =date.getFullYear() + '-' + (date.getMonth() +1)+ '-' + date.getDate();
     
          // convert given string into a number
      let fajrhourprayer =   1 * (times.fajr + "").split(/[^0-9.+-]/)[0]; 
      let fajrminprayer =   1 * (times.fajr + "").split(/[^0-9.+-]/)[1]; 
          // convert given string into a number
      let dhuhrhourprayer =   1 * (times.dhuhr + "").split(/[^0-9.+-]/)[0]; 
      let dhuhrminprayer =   1 * (times.dhuhr + "").split(/[^0-9.+-]/)[1]; 
          // convert given string into a number
      let asrhourprayer =   1 * (times.asr + "").split(/[^0-9.+-]/)[0]; 
      let asrminprayer =   1 * (times.asr + "").split(/[^0-9.+-]/)[1]; 
          // convert given string into a number
      let maghribhourprayer =   1 * (times.maghrib + "").split(/[^0-9.+-]/)[0]; 
      let maghribminprayer =   1 * (times.maghrib + "").split(/[^0-9.+-]/)[1]; 
          // convert given string into a number
      let ishahourprayer =   1 * (times.isha + "").split(/[^0-9.+-]/)[0]; 
      let ishaminprayer =   1 * (times.isha + "").split(/[^0-9.+-]/)[1]; 
      
      times.fajr_iqamah = fajrhourprayer + ':' + (fajrminprayer + 20) ? (fajrminprayer + 20) >= 60 ? fajrhourprayer + 1 + ":" + (fajrminprayer + 20) % 60 : fajrhourprayer + ':' + (fajrminprayer + 20) : fajrhourprayer + ':' + (fajrminprayer + 20);
// 👇️ Integers
    
     const lastDigit2Str = String(fajrminprayer).slice(-1); // 👉️ '7'
     const lastDigit2Str2 = String(fajrminprayer).slice(-2,1); // 👉️ '7'
    //  times.fajr_masjid_jamaah =  (Number(lastDigit2Str2)  >=0 && Number(lastDigit2Str2)  <=20 ) ? lastDigit2Str2 : '';
      // times.fajr_masjid_jamaah2 =  (Number(lastDigit2Str)  >=0 && Number(lastDigit2Str)  <=9 ) ? lastDigit2Str : '' ;
      // times.fajr_masjid_jamaah3 =  (Number(lastDigit2Str2)  >=0 && Number(lastDigit2Str2)  <=20 ) && (fajrminprayer + 20) >= 60 ? fajrhourprayer + 1 + ':' +  ((fajrminprayer + 20) % 60) ?  ((fajrminprayer + 20) % 60)  + 'a': 'b' :  ((fajrminprayer + 20) % 60)  ;
      // times.fajr_masjid = fajrhourprayer + ':' + (parseInt(lastDigit2Str2) + parseInt(lastDigit2Str) + 30 >= 60) ? fajrhourprayer +1 + ":" + (parseInt(lastDigit2Str2) + parseInt(lastDigit2Str) + 30) % 60: fajrhourprayer + 1 +':' + (parseInt(lastDigit2Str2) + parseInt(lastDigit2Str) +30) % 60;
        // ((parseInt(lastDigit2Str2) === 0 ) && ( parseInt(lastDigit2Str) === 0 ))  ?   + ":" + (fajrminprayer + 30) % 60  :(parseInt(lastDigit2Str2) < 60 ?  fajrhourprayer : parseInt(lastDigit2Str) < 209 ? fajrhourprayer  : fajrhourprayer +1) + ":" + (fajrminprayer + 30) % 60;
      if(((parseInt(lastDigit2Str2) === 0 ) && ( parseInt(lastDigit2Str) === 0 ))){
        times.fajr_masjid_jamaah = fajrhourprayer + ':' + (fajrminprayer + 30) % 60
      }
   
    
  
     
      // times.fajr_masjid_jamaahcorrentsome = fajrhourprayer + ':' + (fajrminprayer + 30 >60 ) ? fajrhourprayer +1  && parseInt(lastDigit2Str2)  == 0 ? fajrhourprayer  + ":" + (fajrminprayer + 30) % 60 : parseInt(lastDigit2Str2)  == 0 ? fajrhourprayer  : fajrhourprayer +1  +':' + (fajrminprayer +30) % 60 : '';
      // times.fajr_masjid_jamaah = fajrhourprayer + ':' + (fajrminprayer + 30 >= 60) ? fajrhourprayer  + ":" + (fajrminprayer + 30) % 60: fajrhourprayer + 1 +':' + (fajrminprayer +30) % 60;
      times.dhuhr_iqamah = dhuhrhourprayer + ':' + (dhuhrminprayer + 20) ? (dhuhrminprayer + 20) >= 60 ? dhuhrhourprayer + 1 + ":" + (dhuhrminprayer + 20) % 60 : dhuhrhourprayer + ':' + (dhuhrminprayer + 20) : dhuhrhourprayer + ':' + (dhuhrminprayer + 20);
      times.asr_iqamah = asrhourprayer + ':' + (asrminprayer + 20) ? (asrminprayer + 20) >= 60 ? asrhourprayer + 1 + ":" + (asrminprayer + 20) % 60 : asrhourprayer + ':' + (asrminprayer + 20) : asrhourprayer + ':' + (asrminprayer + 20);
      times.maghrib_iqamah = maghribhourprayer + ':' + (maghribminprayer + 20) ? (maghribminprayer + 20) >= 60 ? maghribhourprayer + 1 + ":" + (maghribminprayer + 20) % 60 : maghribhourprayer + ':' + (maghribminprayer + 20) : maghribhourprayer + ':' + (maghribminprayer + 20);
      times.isha_iqamah = ishahourprayer + ':' + (ishaminprayer + 20) ? (ishaminprayer + 20) >= 60 ? ishahourprayer + 1 + ":" + (ishaminprayer + 20) % 60 : ishahourprayer + ':' + (ishaminprayer + 20) : ishahourprayer + ':' + (ishaminprayer + 20);
      times.currentDate = date.getDate() + ' ' + monthFullName(Number(JSON.parse(localStorage?.getItem('monthselect') as string)?.monthNum || new Date().getMonth())) + ' ' + year;
       
      const masjidJamaah = new MasjidJamaah(times);
      masjidJamaah.FajrJamah();

       /*  let hourprayer =   1 * (times.fajr_iqamah + "").split(/[^0-9.+-]/)[0]; 
        let minprayer =   1 * (times.fajr_iqamah + "").split(/[^0-9.+-]/)[1];  */
       /*  if(parseInt(lastDigit2Str) >=0 && minprayer > 10 ){
          times.fajr_jam = hourprayer + ':' + 15;
          
        } */ 
       /*  if(parseInt(lastDigit2Str) <=8 && minprayer <=40){
          times.test = hourprayer + ':' + 20;
        } */

        let hourprayer =   1 * (times.fajr + "").split(/[^0-9.+-]/)[0]; 
        let minprayer =   1 * (times.fajr + "").split(/[^0-9.+-]/)[1]; 



        if( minprayer >=0 && minprayer <=8 ){
          times.testers = hourprayer + ':' + 16;
        }
      
        if( minprayer >=8 && minprayer <=16 ){
          times.testers = hourprayer + ':' + 24;
        }
        if( minprayer >=16 && minprayer <=24 ){
          times.testers = hourprayer + ':' + 32;
        }
        if( minprayer >=24 && minprayer <=32 ){
          times.testers = hourprayer + ':' + 40;
        }
        if( minprayer >=32 && minprayer <=40 ){
          times.testers = hourprayer + ':' + 48;
        }
        if( minprayer >=40 && minprayer <=48 ){
          times.testers = hourprayer + ':' + 54;
        }
        if( minprayer >=48 && minprayer <=52 ){
          times.testers = hourprayer + ':' + 58;
        }
        if( minprayer >=52 && minprayer <=59 ){
          times.testers = hourprayer + 1+':' + 8;
        }
        if( minprayer == 59){
          times.testers = hourprayer + 1 + ':' + ( minprayer - 49);
        }

       /*  if( minprayer == 33){
          times.test = hourprayer + ':' + (minprayer == 33 ? +40 : '' ).toString()
        } */
     
       /*  if( minprayer >= 31){
         times.test = hourprayer + ':' + (minprayer >= 31 ? +40 : '' ).toString()
        }
        if( minprayer >= 39){
         times.test = hourprayer + ':' + (minprayer >= 39 ? +45 : '' ).toString()
        }
        if( minprayer >= 44){
         times.test = hourprayer + ':' + (minprayer >= 44 ? +47 : '' ).toString()
        }
        if( minprayer >= 57){
         times.test = hourprayer + ':' + (minprayer >= 57 ? +48 : '' ).toString()
        }
        if( minprayer >= 4){
         times.test = hourprayer + ':' + (minprayer >= 4 ? +10 : '' ).toString()
        }
        if( minprayer >=15 ){
         times.test = hourprayer + ':' + (minprayer >= 15 ? +24 : '' ).toString()
        }
        if( minprayer >=19 ){
         times.test = hourprayer + ':' + (minprayer >= 19 ? +30 : '' ).toString()
        } */

      
        console.log("%c ♊: GenerateCalender -> times ", "font-size:16px;background-color:#8f7285;color:white;", times)
        console.log("%c 🇵🇦: GenerateCalender -> minprayer ", "font-size:16px;background-color:#574f3b;color:white;", minprayer)
        // times.test = minprayer == 34 ? hourprayer + ':' + (minprayer == 34 ? +40 : '' ).toString() : '';  times.test = minprayer == 35 ? hourprayer + ':' + (minprayer == 35 ? +45 : '' ).toString() : ''; 
        // times.test = hourprayer + ':' + (minprayer >= 40 ?  +7 : '' ).toString() ;
        // times.test = hourprayer + ':' + ((minprayer >= 10 && minprayer <=20 ) ?  +16 : '' ).toString() ;
       /*  times.test = hourprayer + ':' + (minprayer >= 20 ?  +26 : '' ).toString() ;
        times.test = hourprayer + ':' + (minprayer >= 30 ?  +36 : '' ).toString() ;
        times.test = hourprayer + ':' + (minprayer >= 40 ?  +46 :'' ).toString() ; */

      /*    if( minprayer >=0 && minprayer <=15 ){
          times.test = hourprayer + ':' + minprayer + 10;
        }
    
        if( minprayer >=15 && minprayer <=32 ){
          times.test = hourprayer + ':' + minprayer + 15;
        }
        if( minprayer >=32 && minprayer <=45 ){
          times.test = hourprayer + ':' + (minprayer == 33 ?  +40 : minprayer).toString() ;
          times.test = hourprayer + ':' + (minprayer == 34 ?  +41 : minprayer).toString() ;
        }
        if( minprayer >=45 && minprayer <=59 ){
          times.test = hourprayer + ':' + 25;
        }
        if( minprayer >=59 && minprayer <=7 ){
          times.test = hourprayer + ':' + 30;
        }
        if( minprayer == 59){
          times.test = hourprayer + 1 + ':' + ( minprayer - 49);
        }  */
      let today = new Date();
      let isToday = date.getMonth() == today.getMonth() && date.getDate() == today.getDate();

      let klass = isToday ? 'today-row' : '';
      times.className = klass;
      date.setDate(date.getDate() + 1); // next day
      // setTime out helps you to collect all the data in calendar generator with out will save the last data
    }
    updateTimeTable(dataTable);

    setTimeout(() => {
      dispatch(Calender(dataTable))
      // updateTimeTable(dataTable);
      // setTimes(dataTable);
    }, 100);
    // useCallback dep

  /*   if(dataTable){
      let fajrhourprayer,fajrminprayer =0
      dataTable.forEach((el,index) => {
      if(index >=0){
        el.fajr_masjid_jamaah = fajrhourprayer + ':' + (fajrminprayer + 30) % 60
      }
        
      })
    } */
  };

 
//   React.useMemo(() => {
//   setInterval(()=>{
//     if(CurrentDate){
//     setCurrentDate(new Date().getDate())
      
//       setTimeout(() =>{
//         if(isFetching === false ){
//           // GenerateCalender()
//           setCurrentDate(new Date().getDate()
//         )
          
//       }
      
//     },new Date().getDate())
    
//   }
// },t0)
// return () => {
//   // cancel the subscription
 
// };
// }, [CurrentDate]);
  return (
    <div>
      
      <Middle_Container_Tune>
        {/* <p className="pheadline">Prayer Times Calendar Settings.</p> */}
        <p className='pInputHeadLine'>
          Tune Prayer Times (in minutes)
          {/* <br /> To Decrease use Negative sign symbol - */}
        </p>

        <Container>
          <FPInput val={localStorage.getItem('Imsak')} holder={'Imsak'} />
          <FPInput val={localStorage.getItem('Fajr')} holder={'Fajr'} />
          <FPInput val={localStorage.getItem('Sunrise')} holder={'Sunrise'} />
          <FPInput val={localStorage.getItem('Zhuhr')} holder={'Zhuhr'} />
        </Container>
        <Container>
          <FPInput val={localStorage.getItem('Asr')} holder={'Asr'} />
          <FPInput val={localStorage.getItem('Sunset')} holder={'Sunset'} />
          <FPInput val={localStorage.getItem('Maghrib')} holder={'Maghrib'} />
          <FPInput val={localStorage.getItem('Isha')} holder={'Isha'} />
        </Container>
        <Container>
          <FPInput val={localStorage.getItem('Midnight')} holder={'Midnight'} />

          <div className='middle_container'>
            <label>
              <br />
            </label>
            <button onClick={GenerateCalender} className='middle_button'>
              Generate Calendar
            </button>
          </div>
          <div className='middle_container'>
            <label>CSV Timings</label>
            <button className='middle_button'>Download</button>
          </div>
        </Container>
      </Middle_Container_Tune>
      {/* <FPTablePrayerTime calendar={time} /> */}

    </div>
  );
}

const Container = styled.main`
  display: flex;
  margin-block: 15px;
  gap: 14px;
  align-items: baseline;
`;
const Middle_Container_Tune = styled.div`
  width: 500px;
  justify-content: space-between;
  align-items: center;
  .pInputHeadLine {
    font-size: 16px;
    font-weight: 300;
    color: var(--bbcolor);
    line-height: 1.4;
    padding-block: 23px;
  }
`;

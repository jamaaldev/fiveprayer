import * as React from 'react';
import { useDispatch } from 'react-redux';
import styled from 'styled-components';
import { useGetprayerSettingsMetaAPIQuery } from '../../../../api/prayerSettingsMetaAPI';
import { useGetPrayerTimeTableQuery, useUpdatePrayerTimeTableMutation } from '../../../../api/prayerTimeTableApi';
import { Calender } from '../../../../features/calendars/prayerTimeCalendar';
import { PrayTimes } from '../../../../model/PrayTimes';
import FPInput from '../../../elements/FPInput';
import MasjidJamaah from '../../../../model/MasjidJamaah';
export interface ITunePrayerTimesProps {}

export function TunePrayerTimes(props: ITunePrayerTimesProps) {
const [updateTimeTable] =  useUpdatePrayerTimeTableMutation();
const { data: getprayersettingMeta } = useGetprayerSettingsMetaAPIQuery('fp_prayersettings_meta');

 
  const {data:timetable,isSuccess:success,isLoading,isFetching,isError} = useGetPrayerTimeTableQuery('fp_prayertimetable');
 
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
  //Dhuhr
  if (localStorage.getItem('Dhuhr') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Dhuhr')[0]?.['meta-key'] === 'Dhuhr') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Dhuhr')[0]?.value;
    
    localStorage.setItem('Dhuhr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Dhuhr')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Dhuhr')[0]?.['meta-key'] === 'Dhuhr'){
    localStorage.setItem('Dhuhr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'Dhuhr')[0]?.value);

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
  


  
  const DownloadCalendar = () =>{
    // first check if object and return! if not convert to object
    let timeTableMonth = typeof timetable !== 'object' ? JSON.parse(timetable) : timetable;
    let timeTableColumnKey =
    `${Object.keys(timeTableMonth[0])
      .map((value) => `"${value}"`)
      .join(',')}` + '\r\n';
        
    let csvContent = timeTableMonth.reduce((timeTableValue, next) => {
      timeTableValue +=
        `${Object.values(next)
          .map((value) => `"${value}"`)
          .join(',')}` + '\r\n';
      return timeTableValue;
    }, timeTableColumnKey);
  let element = document.createElement('a');
    element.href = 'data:text/csv;charset=utf-8,' + encodeURI(csvContent);
    element.target = '_blank';
    element.download = 'fiveprayer.csv';
    element.click();

}



  
  const dispatch = useDispatch();

  const prayTimes = PrayTimes();
  const higherLat = JSON.parse( localStorage.getItem('higherlatitude') as string)?.method;
  const asrculc = JSON.parse( localStorage.getItem('asrcalculation')as string)?.method;
  const culcmethod = JSON.parse( localStorage.getItem('calcmedthod')as string)?.method;
  const adjustmethod = JSON.parse( localStorage.getItem('calcmedthod')as string);
  const midnightculc = JSON.parse( localStorage.getItem('midnightcalculation')as string)?.method;
  

  // return month full name
  function monthFullName(month: number) {
    const monthName = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    return monthName[month];
  }
  prayTimes.setMethod(culcmethod);

  prayTimes.tune({
    imsak: Number(localStorage.getItem('Imsak')),
    fajr: Number(localStorage.getItem('Fajr')),
    dhuhr: Number(localStorage.getItem('Dhuhr')),
    asr: Number(localStorage.getItem('Asr')),
    maghrib: Number(localStorage.getItem('Maghrib')),
    isha: Number(localStorage.getItem('Isha')),
    midnight: Number(localStorage.getItem('Midnight')),
    sunrise: Number(localStorage.getItem('Sunrise')),
    sunset: Number(localStorage.getItem('Sunset')),
  });
  prayTimes.adjust({
    asr: asrculc,
    highLats: higherLat,
    midnight: midnightculc,
    fajr:adjustmethod?.params?.Fajr,
    dhuhr:adjustmethod?.params?.Dhuhr,
    maghrib:adjustmethod?.params?.Maghrib,
    isha:adjustmethod?.params?.Isha,

  });
  const GenerateCalender = () => {
    

   
 
    const currentDate = new Date();
    let year = currentDate.getFullYear();
    let month = currentDate.getMonth();

    let day = currentDate.getDate();

    let title = day + ' ' + monthFullName(Number(JSON.parse(localStorage?.getItem('monthselect') as string)?.monthNum || new Date().getMonth())) + ' ' + year;
    let date = new Date(year, Number(0));
    
    let endDate = new Date(year, Number(13));

    const dataTable: string[] = [];
    while (date < endDate) {
      let times = prayTimes.getTimes(date, [Number(JSON.parse(localStorage?.getItem('location') as string)?.lat ), Number(JSON.parse(localStorage?.getItem('location') as string)?.lng )], 'auto', 'auto', '24h');
      times.fajr_begins = times.fajr;
      times.dhuhr_begins = times.dhuhr;
      times.asr_begins = times.asr;
      times.maghrib_begins = times.maghrib;
      times.isha_begins = times.isha;
      times.today = date.getDate().toString();
      times.date =date.getFullYear() + '-' + (date.getMonth() +1)+ '-' + date.getDate();
      dataTable.push(times);
     
          // convert given string into a number
      let fajrhourprayer =   1 * (times.fajr_begins + "").split(/[^0-9.+-]/)[0]; 
      let fajrminprayer =   1 * (times.fajr_begins + "").split(/[^0-9.+-]/)[1]; 
          // convert given string into a number
      let dhuhrhourprayer =   1 * (times.dhuhr_begins + "").split(/[^0-9.+-]/)[0]; 
      let dhuhrminprayer =   1 * (times.dhuhr_begins + "").split(/[^0-9.+-]/)[1]; 
          // convert given string into a number
      let asrhourprayer =   1 * (times.asr_begins + "").split(/[^0-9.+-]/)[0]; 
      let asrminprayer =   1 * (times.asr_begins + "").split(/[^0-9.+-]/)[1]; 
          // convert given string into a number
      let maghribhourprayer =   1 * (times.maghrib_begins + "").split(/[^0-9.+-]/)[0]; 
      let maghribminprayer =   1 * (times.maghrib_begins + "").split(/[^0-9.+-]/)[1]; 
          // convert given string into a number
      let ishahourprayer =   1 * (times.isha_begins + "").split(/[^0-9.+-]/)[0]; 
      let ishaminprayer =   1 * (times.isha_begins + "").split(/[^0-9.+-]/)[1]; 
      
// 👇️ Integers
    
      
      // times.fajr_masjid_jamaah = fajrhourprayer + ':' + (fajrminprayer + 30 >= 60) ? fajrhourprayer  + ":" + (fajrminprayer + 30) % 60: fajrhourprayer + 1 +':' + (fajrminprayer +30) % 60;
      times.fajr_iqamah = fajrhourprayer + ':' + (fajrminprayer + Number(localStorage.getItem('IQFajr'))) ? (fajrminprayer + Number(localStorage.getItem('IQFajr'))) >= 60 ? fajrhourprayer + 1 + ":" + (fajrminprayer + Number(localStorage.getItem('IQFajr'))) % 60 : fajrhourprayer + ':' + (fajrminprayer + Number(localStorage.getItem('IQFajr'))) : fajrhourprayer + ':' + (fajrminprayer + Number(localStorage.getItem('IQFajr')));
      times.dhuhr_iqamah = dhuhrhourprayer + ':' + (dhuhrminprayer +  Number(localStorage.getItem('IQDhuhr'))) ? (dhuhrminprayer +  Number(localStorage.getItem('IQDhuhr'))) >= 60 ? dhuhrhourprayer + 1 + ":" + (dhuhrminprayer +  Number(localStorage.getItem('IQDhuhr'))) % 60 : dhuhrhourprayer + ':' + (dhuhrminprayer +  Number(localStorage.getItem('IQDhuhr'))) : dhuhrhourprayer + ':' + (dhuhrminprayer +  Number(localStorage.getItem('IQDhuhr')));
      times.asr_iqamah = asrhourprayer + ':' + (asrminprayer +  Number(localStorage.getItem('IQAsr'))) ? (asrminprayer +  Number(localStorage.getItem('IQAsr'))) >= 60 ? asrhourprayer + 1 + ":" + (asrminprayer +  Number(localStorage.getItem('IQAsr'))) % 60 : asrhourprayer + ':' + (asrminprayer +  Number(localStorage.getItem('IQAsr'))) : asrhourprayer + ':' + (asrminprayer +  Number(localStorage.getItem('IQAsr')));
      times.maghrib_iqamah = maghribhourprayer + ':' + (maghribminprayer +  Number(localStorage.getItem('IQMaghrib'))) ? (maghribminprayer +  Number(localStorage.getItem('IQMaghrib'))) >= 60 ? maghribhourprayer + 1 + ":" + (maghribminprayer +  Number(localStorage.getItem('IQMaghrib'))) % 60 : maghribhourprayer + ':' + (maghribminprayer +  Number(localStorage.getItem('IQMaghrib'))) : maghribhourprayer + ':' + (maghribminprayer +  Number(localStorage.getItem('IQMaghrib')));
      times.isha_iqamah = ishahourprayer + ':' + (ishaminprayer +  Number(localStorage.getItem('IQIsha'))) ? (ishaminprayer +  Number(localStorage.getItem('IQIsha'))) >= 60 ? ishahourprayer + 1 + ":" + (ishaminprayer +  Number(localStorage.getItem('IQIsha'))) % 60 : ishahourprayer + ':' + (ishaminprayer +  Number(localStorage.getItem('IQIsha'))) : ishahourprayer + ':' + (ishaminprayer +  Number(localStorage.getItem('IQIsha')));
      times.currentDate = date.getDate() + ' ' + monthFullName(Number(date.getMonth())) + ' ' + date.getFullYear();
       
      const masjidJamaah = new MasjidJamaah(times);
      masjidJamaah.FajrJamah();

        
      let today = new Date();
      let isToday = date.getMonth() == today.getMonth() && date.getDate() == today.getDate();

      let klass = isToday ? 'today-row' : '';
      times.className = klass;
      date.setDate(date.getDate() + 1); // next day
    }
    updateTimeTable(dataTable);

    setTimeout(() => {
      dispatch(Calender(dataTable))
    }, 100);
   
  };

  return (
    <div>
      
      <Middle_Container_Tune>
        <p className='pInputHeadLine'>
          Tune Prayer Times (in minutes)
        </p>

        <Container>
          <FPInput val={localStorage.getItem('Imsak')} holder={'Imsak'} />
          <FPInput val={localStorage.getItem('Fajr')} holder={'Fajr'} />
          <FPInput val={localStorage.getItem('Sunrise')} holder={'Sunrise'} />
          <FPInput val={localStorage.getItem('Dhuhr')} holder={'Dhuhr'} />
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
            <button onClick={DownloadCalendar} className='middle_button'>Download</button>
          </div>
        </Container>
      </Middle_Container_Tune>

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
  width: 380px;
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

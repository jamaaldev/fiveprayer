import '../../css/FPTablePrayer.scss'

import { useGetPrayerTimeTableQuery } from '../../../../api/prayerTimeTableApi';
import { useDispatch } from 'react-redux';
import React from 'react';

export type FPCalendar ={
    currentDate: string[]; fajr: string[]; sunrise: string[]; dhuhr:string[]; className:string;
    asr: string[]; sunset:string[]; maghrib: string[]; isha: string[]; midnight:string[]; day:number[];date:number;today:number;

  }
export type FPCal ={
    calendar:FPCalendar

  }
function FPTablePrayerTime({calendar}) {
  const [month,SetMonth] = React.useState<FPCalendar[]>();
 const {data:timetable,isFetching,isLoading} = useGetPrayerTimeTableQuery('fp_prayertimetable');
 console.log("🚀 ~ file: FPTablePrayerTime.tsx ~ line 19 ~ FPTablePrayerTime ~ timetable", timetable)
 
 React.useEffect(()=>{
   
   if(timetable?.length){
  
     const newone = timetable?.filter((table:FPCalendar) => {
     return  new Date(table.date).getFullYear() === new Date().getFullYear() &&  new Date(table.date).getMonth() === ( Number(JSON.parse(localStorage?.getItem('monthselect') as string)?.monthNum ) || new Date().getMonth());
     }) 
     SetMonth(newone)
    }
 },[timetable, new Date().getMonth(), Number(JSON.parse(localStorage?.getItem('monthselect') as string)?.monthNum || new Date().getMonth()), 1])

  return (
    <div>

{ month?.length ?
<table  className='FP_TablePrayer_'>
<thead>
    <tr>
      <th>Date</th>
      <th>Fajr</th>
      <th>Fajr Iqamah</th>
      <th>Fajr Masjid Iqamah</th>
      <th>Sunrise</th>
      <th>Dhuhr</th>
      <th>Dhuhr Iqamah</th>
      <th>Asr</th>
      <th>Asr Iqamah</th>
      <th>Maghrib</th>
      <th>Maghrib Iqamah</th>
      <th>Isha</th>
      <th>Isha Iqamah</th>
      <th>Midnight</th>
    </tr>
</thead>
 {month?.map((calendars:FPCalendar,index:number) => (
 <tbody key={index}>
    <tr className={calendars?.today === new Date().getDate().toString() ?  'today-row'  : null  }>
    <td>{calendars?.currentDate}</td>
    <td>{calendars?.fajr_begins}</td>
    <td>{calendars?.fajr_iqamah}</td>
    <td>{calendars?.fajr_masjid_jamaah}</td>
    <td>{calendars?.sunrise}</td>
    <td>{calendars?.dhuhr_begins}</td>
    <td>{calendars?.dhuhr_iqamah}</td>
    <td>{calendars?.asr_begins}</td>
    <td>{calendars?.asr_iqamah}</td>
    <td>{calendars?.maghrib_begins}</td>
    <td>{calendars?.maghrib_iqamah}</td>
    <td>{calendars?.isha_begins}</td>
    <td>{calendars?.isha_iqamah}</td>
    <td>{calendars?.midnight}</td>
  </tr>
 </tbody>
 ))}
</table>
: ''}

    </div>
  )
}

export default FPTablePrayerTime
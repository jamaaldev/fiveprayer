import '../../css/FPTablePrayer.scss'

import { useGetPrayerTimeTableQuery } from '../../../../api/prayerTimeTableApi';
import { useDispatch } from 'react-redux';

export type FPCalendar ={
    currentDate: string[]; fajr: string[]; sunrise: string[]; dhuhr:string[]; className:string;
    asr: string[]; sunset:string[]; maghrib: string[]; isha: string[]; midnight:string[]; day:number[];

  }
export type FPCal ={
    calendar:FPCalendar

  }
function FPTablePrayerTime({calendar}) {
 const {data:timetable,isFetching,isLoading} = useGetPrayerTimeTableQuery('fp_prayertimetable');

 
 
 

  return (
    <div>

{ timetable?.length ?
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
 {timetable?.map((calendars:FPCalendar,index:number) => (
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
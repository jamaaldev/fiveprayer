import React, { useCallback, useEffect, useMemo } from 'react'
import '../../css/FPTablePrayer.scss'
import parse, { domToReact } from 'html-react-parser';
import tables from '../../../../utils/json/tables.json'
import { useGetPrayerTimeTableQuery } from '../../../../api/prayerTimeTableApi';
import { AsrChecked, HigherChecked, LocationChecked, MedothChecked, MidnightChecked } from '../../../../features/search/searchTownCity';
import { useSelector,useDispatch } from 'react-redux';

export type FPCalendar ={
    currentDate: string[]; fajr: string[]; sunrise: string[]; dhuhr:string[]; className:string;
    asr: string[]; sunset:string[]; maghrib: string[]; isha: string[]; midnight:string[]; day:number[];

  }
export type FPCal ={
    calendar:FPCalendar

  }
function FPTablePrayerTime({calendar}) {
 const {data:timetable,isFetching,isLoading} = useGetPrayerTimeTableQuery('fp_prayertimetable');
 const dispatch = useDispatch()

 
 
 

  return (
    <div>

{ timetable?.length ?
<table  className='FP_TablePrayer_'>
<thead>
    <tr>
      <th>Date</th>
      <th>Fajr</th>
      <th>Sunrise</th>
      <th>Zhuhr</th>
      <th>Asr</th>
      <th>Maghrib</th>
      <th>Isha</th>
      <th>Midnight</th>
    </tr>
</thead>
 {timetable?.map((calendars:FPCalendar,index:number) => (
 <tbody key={index}>
    <tr className={calendars?.today === new Date().getDate().toString() ?  'today-row'  : null  }>
    <td>{calendars?.currentDate}</td>
    <td>{calendars?.fajr_begins}</td>
    <td>{calendars?.sunrise}</td>
    <td>{calendars?.zuhr_begins}</td>
    <td>{calendars?.asr_begins}</td>
    <td>{calendars?.maghrib_begins}</td>
    <td>{calendars?.isha_begins}</td>
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
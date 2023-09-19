import { useGetPrayerTimeTableQuery } from '../../../../api/prayerTimeTableApi';
import React from 'react';
import styled from 'styled-components';
declare const FivePrayerStyleMonth;

export type FPCalendar = {
	currentDate: string[];
	fajr: string[];
	sunrise: string[];
	dhuhr: string[];
	className: string;
	asr: string[];
	sunset: string[];
	maghrib: string[];
	isha: string[];
	midnight: string[];
	day: number[];
	date: number;
	today: string;
	fajr_begins: string;
	fajr_iqamah: string;
	dhuhr_begins: string;
	dhuhr_iqamah: string;
	asr_begins: string;
	asr_iqamah: string;
	maghrib_begins: string;
	maghrib_iqamah: string;
	isha_begins: string;
	isha_iqamah: string;
};
export type FPCal = {
	calendar: FPCalendar;
};
function FPTablePrayerTime() {
	const [ month, SetMonth ] = React.useState< FPCalendar[] >();
	const { data: timetable, isSuccess } =
		useGetPrayerTimeTableQuery( 'fp_prayertimetable' );

	React.useEffect( () => {
		if ( isSuccess ) {
			const newone = timetable?.filter( ( table: FPCalendar ) => {
				return (
					new Date( table.date ).getFullYear() ===
						new Date().getFullYear() &&
					new Date( table.date ).getMonth() ===
						( Number(
							JSON.parse(
								sessionStorage?.getItem(
									'monthselect'
								) as string
							)?.monthNum
						) || new Date().getMonth() )
				);
			} );
			SetMonth( newone );
		}
	}, [
		timetable,
		isSuccess,
		new Date().getMonth(),
		Number(
			JSON.parse( sessionStorage?.getItem( 'monthselect' ) as string )
				?.monthNum || new Date().getMonth()
		),
		1,
	] );

	return (
		<div>
			{ month?.length ? (
				<FivePrayerTable>
					<table className="FP_TablePrayer_">
						<thead>
							<tr id="fiveprayer-tbmonth-second">
								<th>Date</th>
								<th>Fajr</th>
								<th>Fajr Iqamah</th>
								{ /* <th>Fajr Masjid Iqamah</th> */ }
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
						{ month?.map(
							( calendars: FPCalendar, index: number ) => (
								<tbody key={ index }>
									<tr
										id={
											calendars?.today ===
											new Date().getDate().toString()
												? 'today-row'
												: ''
										}
									>
										<td>{ calendars?.currentDate }</td>
										<td>{ calendars?.fajr_begins }</td>
										<td>{ calendars?.fajr_iqamah }</td>
										{ /* <td>{calendars?.fajr_masjid_jamaah}</td> */ }
										<td>{ calendars?.sunrise }</td>
										<td>{ calendars?.dhuhr_begins }</td>
										<td>{ calendars?.dhuhr_iqamah }</td>
										<td>{ calendars?.asr_begins }</td>
										<td>{ calendars?.asr_iqamah }</td>
										<td>{ calendars?.maghrib_begins }</td>
										<td>{ calendars?.maghrib_iqamah }</td>
										<td>{ calendars?.isha_begins }</td>
										<td>{ calendars?.isha_iqamah }</td>
										<td>{ calendars?.midnight }</td>
									</tr>
								</tbody>
							)
						) }
					</table>
				</FivePrayerTable>
			) : (
				''
			) }
		</div>
	);
}

const FivePrayerTable = styled.div`
	.FP_TablePrayer_ {
		width: 100%;
		border-collapse: collapse;
	}
	.FP_TablePrayer_ th,
	.FP_TablePrayer_ td {
		padding: 0;
		padding-inline: 3px;
		padding-block: 7px;
		border: 1px solid #02352838;
		text-align: center;
	}

	.FP_TablePrayer_ tbody:nth-child( even ) {
		background-color: #${ FivePrayerStyleMonth?.evenrowbg };
		color: #${ FivePrayerStyleMonth?.evenrowclr };
	}
`;
export default FPTablePrayerTime;

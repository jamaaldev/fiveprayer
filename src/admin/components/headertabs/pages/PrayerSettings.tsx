import * as React from 'react';
import '../../elements/css/FPInput.scss';
import styled from 'styled-components';
import { useSelector } from 'react-redux';
import { RootState } from '../../../../app/store';
import FPTablePrayerTime, { FPCal, FPCalendar } from './PrayerSettings/FPTablePrayerTime';
import PrayerTimesCalendarSettings from './PrayerSettings/PrayerTimesCalendarSettings';
import { TunePrayerTimes } from './PrayerSettings/TunePrayerTimes';
import { IqamahDelay } from './PrayerSettings/IqamahDelay';
import { useGetPrayerTimeTableQuery } from '../../../api/prayerTimeTableApi';
const PrayerSettings = () => {
  // const { data: calendar, isFetching, isLoading } = useGetPrayerTimeTableQuery('fp_prayertimetable');

  // const { calendar } = useSelector((state: RootState) => state.prayer);

  return (
    <>
      <div id='PrayerSettings' className='tabcontent'>
        <SectionContainer>

          <Section>
            {/* left */}
            <PrayerTimesCalendarSettings />
            <span></span>
            {/* middle */}
            <TunePrayerTimes />
            <span></span>
            {/* right */}
            <IqamahDelay />
          </Section>
        </SectionContainer>
        <FPTablePrayerTime />
      </div>
    </>
  );
};

const SectionContainer = styled.section`
  display: flex;
  flex-direction: column;
 .Toastify__toast-container--top-right {
  top: 4em !important;
 
}

`;
const Section = styled.section`
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  span {
    border-right: 3px solid #f8f8f8;
    height: 340px;
    margin-inline: 5px;
  }
`;
export default PrayerSettings;

import * as React from 'react';
import '../../elements/css/FPInput.scss';
import styled from 'styled-components';
import { useSelector } from 'react-redux';
import { RootState } from '../../../../app/store';
import FPTablePrayerTime, { FPCal, FPCalendar } from './PrayerSettings/FPTablePrayerTime';
import PrayerTimesCalendar from './PrayerSettings/PrayerTimesCalendar';
import { TunePrayerTimes } from './PrayerSettings/TunePrayerTimes';
import { IqamahDelay } from './PrayerSettings/IqamahDelay';
// import {ListCityTown} from '../../../features/search/searchTownCity'
const PrayerSettings = () => {
  const { calendar } = useSelector((state: RootState) => state.prayer);

  return (
    <>
      <div id='PrayerSettings' className='tabcontent'>
        <SectionContainer>
          {/* <p className="pheadline">Prayer Times Calendar Settings.</p> */}

          <Section>
            {/* left */}
            <PrayerTimesCalendar />
            <span></span>
            {/* middle */}
            <TunePrayerTimes />
            <span></span>
            {/* right */}
            <IqamahDelay />
          </Section>
        </SectionContainer>
        <FPTablePrayerTime calendar={calendar} />
      </div>
    </>
  );
};

const SectionContainer = styled.section`
  display: flex;
  flex-direction: column;
`;
const Section = styled.section`
  display: flex;
  flex-direction: row;
  span {
    border-right: 3px solid #f8f8f8;
    height: 340px;
    margin-inline: 5px;
  }
`;
export default PrayerSettings;

import * as React from 'react';
import { useDispatch } from 'react-redux';
import { useSelector } from 'react-redux';
import styled from 'styled-components';
import { RootState } from '../../../../../app/store';
import { useGetLocationQuery } from '../../../../api/locationApi';
import { useGetprayerSettingsMetaAPIQuery, useInsertprayerSettingsMetaAPIMutation } from '../../../../api/prayerSettingsMetaAPI';
import { AsrChecked, CalCMethod, HigherChecked, ListCityTown, LocationChecked, MedothChecked, MidnightChecked, MonthChecked, NameAndMethod } from '../../../../features/search/searchTownCity';
import FPDropList from '../../../elements/FPDropList';
import FPSearch from '../../../elements/FPSearch';

export interface IPrayerTimesCalendarProps {}

export default function PrayerTimesCalendarSettings (props: IPrayerTimesCalendarProps) {
  // const { data } = useGetPrayerTimeTableQuery('fp_prayertimetable');
  
  const { data: getprayersettingMeta, isFetching, isSuccess, isError, isLoading } = useGetprayerSettingsMetaAPIQuery('fp_prayersettings_meta');
  const [insertprayersettingmeta] = useInsertprayerSettingsMetaAPIMutation();
  const { data: locationcity } = useGetLocationQuery('fp_location');

  const { listMonth } = useSelector((state: RootState) => state.prayer);
  const { asrChecked, monthChecked, midnightChecked, locationChecked, higherChecked, medothChecked, ListCity, CalcMethods, HigherLats, MidnightMode, AsrMedoths, CityTown } = useSelector((state: RootState) => state.searchtowncity);
  const dispatch = useDispatch();

  if (localStorage.getItem('asrcalculation') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'asrcalculation')[0]?.['meta-key'] === 'asrcalculation') {
    localStorage.setItem('asrcalculation', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'asrcalculation')[0]?.value);
  }
  if (localStorage.getItem('location') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'location')[0]?.['meta-key'] === 'location') {
    localStorage.setItem('location', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'location')[0]?.value);
  }
  if (localStorage.getItem('midnightcalculation') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'midnightcalculation')[0]?.['meta-key'] === 'midnightcalculation') {
    localStorage.setItem('midnightcalculation', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'midnightcalculation')[0]?.value);
  }
  if (localStorage.getItem('higherlatitude') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'higherlatitude')[0]?.['meta-key'] === 'higherlatitude') {
    localStorage.setItem('higherlatitude', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'higherlatitude')[0]?.value);
  }
  if (localStorage.getItem('calcmedthod') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'calcmedthod')[0]?.['meta-key'] === 'calcmedthod') {
    localStorage.setItem('calcmedthod', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'calcmedthod')[0]?.value);

  }

  const dropReset = (reset) => {};

  const calcMethodsList = (checked: EventTarget, el: CalCMethod, meta) => {
    localStorage.setItem('calcmedthod', JSON.stringify(el));
    const calcmedoth = { value: el, meta: meta };
    insertprayersettingmeta(calcmedoth);
    dispatch(MedothChecked(el.method));
  };

  const higherMethodsList = (checked: EventTarget, el: NameAndMethod, meta) => {
    localStorage.setItem('higherlatitude', JSON.stringify(el));
    const higher = { value: el, meta: meta };
    insertprayersettingmeta(higher);
    // dispatch(HigherChecked(el.method));
  };

  const midnightModeMethodsList = (checked: EventTarget, el: NameAndMethod, meta) => {
    localStorage.setItem('midnightcalculation', JSON.stringify(el));
    const midnight = { value: el, meta: meta };
    insertprayersettingmeta(midnight);
    // dispatch(MidnightChecked(el.method));
  };

  const asrMedothsMethodsList = (checked: EventTarget, el: NameAndMethod, meta) => {
    localStorage.setItem('asrcalculation', JSON.stringify(el));
    const asrcal = { value: el, meta: meta };
    insertprayersettingmeta(asrcal);
    // dispatch(AsrChecked(el.method));
  };
  // return month full name
  function monthFullName(month: number) {
    var monthName = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    return monthName[month];
  }
  const monthList = (checked: string, el: string) => {
    
    localStorage.setItem('monthselect', JSON.stringify({ monthName: el, monthNum: checked }));
    // setMonths(parseInt(checked));

    dispatch(MonthChecked(el));
  };
const checkAutoMonth = () =>{
  return localStorage.getItem('monthselect') ? JSON.parse(localStorage?.getItem('monthselect') as string)?.monthName : monthFullName(Number(JSON.parse(localStorage?.getItem('monthselect') as string)?.monthNum || new Date().getMonth()))
}
  const locationList = React.useCallback(
    (checked: EventTarget, el: ListCityTown, meta: string) => {
      localStorage.setItem('location', JSON.stringify(el));
      const loc = { value: el, meta: meta };
      insertprayersettingmeta(loc);
     
    },
    [localStorage.getItem('location'), isSuccess]
  );

  let listMonthList = listMonth.map((el, indexed) => (
    <option key={indexed} onClick={(e: React.MouseEvent<HTMLOptionElement>) => monthList(e.currentTarget.value, el)} className='FPlabel' value={indexed}>
      {el}
    </option>
  ));

  let listCityList = locationcity?.map((el, indexed) => (
    <option key={indexed} data-lat={el.lat} data-lng={el.lng} onClick={(e: React.MouseEvent) => locationList(e.target, el, 'location')} value={el.city}>
      {`${el.country} (${el.city})`}
    </option>
  ));

  let calcMethodList = CalcMethods.map((el, indexed) => (
    <option key={indexed} onClick={(e: React.MouseEvent) => calcMethodsList(e.target, el, 'calcmedthod')} value={el.method}>
      {el.name}
    </option>
  ));

  let higherLatList = HigherLats.map((el, indexed) => (
    <option key={indexed} onClick={(e) => higherMethodsList(e.target, el, 'higherlatitude')} value={el.method}>
      {el.name}
    </option>
  ));

  let midnightModeList = MidnightMode.map((el, indexed) => (
    <option key={indexed} onClick={(e) => midnightModeMethodsList(e.target, el, 'midnightcalculation')} value={el.method}>
      {el.name}
    </option>
  ));

  let asrMedothList = AsrMedoths.map((el, indexed) => (
    <option key={indexed} onClick={(e) => asrMedothsMethodsList(e.target, el, 'asrcalculation')} value={el.method}>
      {el.name}
    </option>
  ));

  return (
    <div >
      <Left>
        <ParaContainer>
          <p className='pheadline'>Prayer Times Calendar Settings.</p>
        </ParaContainer>

        <Container onClick={(e) => dropReset(e.target)}>
          <FPDropList
            isloading={isLoading}
            name={'month'}
            holder={'Month'}
            label={'Select Month'}
            options={listMonthList}
            checked={checkAutoMonth()}
          />
          <FPSearch
            name={'city'}
            holder={'Location,City'}
            label={'Search Location'}
            options={listCityList}
            checked={localStorage.getItem('location') ? JSON.parse(localStorage?.getItem('location') as string)?.city : ''}
          />
        
        </Container>
        <Container onClick={(e) => dropReset(e.target)}>
          <FPDropList
            isloading={isLoading}
            name={'adjustment'}
            holder={'Higher Latitude Adjustment Method'}
            label={'Select Higher Latitude Adjustment Method'}
            options={higherLatList}
            checked={localStorage.getItem('higherlatitude') ? JSON.parse(localStorage?.getItem('higherlatitude') as string)?.name : ''}
          />

          <FPDropList
            isloading={isLoading}
            name={'method'}
            holder={'Method (Learn more about calculation)'}
            label={'Select Calculation Methods'}
            options={calcMethodList}
            checked={localStorage.getItem('calcmedthod') ? JSON.parse(localStorage?.getItem('calcmedthod') as string)?.name : ''}
          />
        </Container>
        <Container onClick={(e) => dropReset(e.target)}>
          <FPDropList
            isloading={isLoading}
            name={'asrcalc'}
            holder={'Only affects Asr calculation'}
            label={'Select Juristic School'}
            options={asrMedothList}
            checked={localStorage.getItem('asrcalculation') ? JSON.parse(localStorage?.getItem('asrcalculation') as string)?.name : ''}
          />

          <FPDropList
            isloading={isLoading}
            name={'midcalc'}
            holder={'Midnight Calculation Mode'}
            label={'Select Midnight Calculation Mode'}
            options={midnightModeList}
            checked={localStorage.getItem('midnightcalculation') ? JSON.parse(localStorage?.getItem('midnightcalculation') as string)?.name : ''}
          />
        </Container>
      </Left>
    </div>
  );
}

const Left = styled.div`
  max-width: 740px;
  /* margin-right: 5px; */
  justify-content: space-between;
  align-items: center;
`;

const Container = styled.main`
  display: flex;
  margin-block: 15px;
  gap: 14px;
  align-items: baseline;
`;

const ParaContainer = styled.div`
  display: flex;
  /* flex-direction: column; */
`;

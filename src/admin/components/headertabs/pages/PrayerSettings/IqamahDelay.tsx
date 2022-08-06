import * as React from 'react';
import { useSelector } from 'react-redux';
import styled from 'styled-components';
import { RootState } from '../../../../../app/store';
import { useGetprayerSettingsMetaAPIQuery } from '../../../../api/prayerSettingsMetaAPI';
import FPInput from '../../../elements/FPInput';

export interface IIqamahDelayProps {
}

export function IqamahDelay (props: IIqamahDelayProps) {
  const { data: getprayersettingMeta } = useGetprayerSettingsMetaAPIQuery('fp_prayersettings_meta');

    const { IQFajr, IQZhuhr, IQAsr, IQMaghrib, IQIsha } = useSelector((state: RootState) => state.IqamaDelay);


  //IQFajr
  if (localStorage.getItem('IQFajr') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQFajr')[0]?.['meta-key'] === 'IQFajr') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQFajr')[0]?.value;
    console.log("%c 🏵️: TunePrayerTimes -> num ", "font-size:16px;background-color:#992c59;color:white;", Number(num) )
    
    localStorage.setItem('IQFajr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQFajr')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQFajr')[0]?.['meta-key'] === 'IQFajr'){
    localStorage.setItem('IQFajr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQFajr')[0]?.value);

  }
  //IQZhuhr
  if (localStorage.getItem('IQZhuhr') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQZhuhr')[0]?.['meta-key'] === 'IQZhuhr') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQZhuhr')[0]?.value;
    console.log("%c 🏵️: TunePrayerTimes -> num ", "font-size:16px;background-color:#992c59;color:white;", Number(num) )
    
    localStorage.setItem('IQZhuhr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQZhuhr')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQZhuhr')[0]?.['meta-key'] === 'IQZhuhr'){
    localStorage.setItem('IQZhuhr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQZhuhr')[0]?.value);

  }
  //IQAsr
  if (localStorage.getItem('IQAsr') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQAsr')[0]?.['meta-key'] === 'IQAsr') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQAsr')[0]?.value;
    console.log("%c 🏵️: TunePrayerTimes -> num ", "font-size:16px;background-color:#992c59;color:white;", Number(num) )
    
    localStorage.setItem('IQAsr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQAsr')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQAsr')[0]?.['meta-key'] === 'IQAsr'){
    localStorage.setItem('IQAsr', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQAsr')[0]?.value);

  }
  //IQMaghrib
  if (localStorage.getItem('IQMaghrib') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQMaghrib')[0]?.['meta-key'] === 'IQMaghrib') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQMaghrib')[0]?.value;
    console.log("%c 🏵️: TunePrayerTimes -> num ", "font-size:16px;background-color:#992c59;color:white;", Number(num) )
    
    localStorage.setItem('IQMaghrib', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQMaghrib')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQMaghrib')[0]?.['meta-key'] === 'IQMaghrib'){
    localStorage.setItem('IQMaghrib', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQMaghrib')[0]?.value);

  }
  //IQIsha
  if (localStorage.getItem('IQIsha') === null && getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQIsha')[0]?.['meta-key'] === 'IQIsha') {
    const num = getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQIsha')[0]?.value;
    console.log("%c 🏵️: TunePrayerTimes -> num ", "font-size:16px;background-color:#992c59;color:white;", Number(num) )
    
    localStorage.setItem('IQIsha', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQIsha')[0]?.value);
  } else if(getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQIsha')[0]?.['meta-key'] === 'IQIsha'){
    localStorage.setItem('IQIsha', getprayersettingMeta?.filter((el) => el?.['meta-key'] === 'IQIsha')[0]?.value);

  }

  return (
    <div>
          <Right_Container_IQamah>
              <p className='pInputHeadLine'>
                Iqamah delay (in minutes)
                <br />
              </p>
              <Container>
                <FPInput val={localStorage.getItem('IQFajr')} holder={'IQFajr'} />
                <FPInput val={localStorage.getItem('IQZhuhr')} holder={'IQZhuhr'} />
              </Container>
              <Container>
                <FPInput val={localStorage.getItem('IQAsr')} holder={'IQAsr'} />
                <FPInput val={localStorage.getItem('IQMaghrib')} holder={'IQMaghrib'} />
              </Container>
              <Container>
                <FPInput val={localStorage.getItem('IQIsha')} holder={'IQIsha'} />
              </Container>
            </Right_Container_IQamah>
    </div>
  );
}


const Right_Container_IQamah = styled.div`
  width: 400px;
  flex: 1;
  margin-top: 22px;
  justify-content: space-between;
  align-items: center;
  .pInputHeadLine {
    font-size: 16px;
    font-weight: 300;
    color: var(--bbcolor);
    line-height: 1.4;
    padding-block: 20px;
  }
`;

const Container = styled.main`
  display: flex;
  margin-block: 15px;
  gap: 14px;
  align-items: baseline;
`;
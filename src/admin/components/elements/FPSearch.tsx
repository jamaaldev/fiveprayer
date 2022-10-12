import * as React from 'react';
import ReactDOM from 'react-dom';
import styled from 'styled-components';

import { useEffect } from 'react';

function FPSearch({ holder, label, options, checked, name }) {

  
  const droplist = React.useRef<HTMLInputElement>(null);
  const dropclick = React.useRef<HTMLInputElement>(null);
  let stopTime: number;
  let node: Element;
  node = ReactDOM?.findDOMNode(droplist?.current) as HTMLInputElement;
  if (droplist?.current) {
    node = droplist?.current;
  }
  const dropRemove = (removed: EventTarget) => {
    node?.classList?.toggle('show');
    clearTimeout(stopTime);
  };
  const dropLeave = (selected: EventTarget) => {
    node?.classList?.remove('show');
  };
  const dropWait = (selected: EventTarget) => {
  };
  const dropSelected = (selected: EventTarget) => {};

  useEffect(() => {}, [localStorage.getItem('city'), dropclick, droplist]);
  const dropClicks = (drop) => {
    if (droplist?.current) {
      node = droplist?.current;
    }
  };
  let timeTyping: number;
  let prevues: string;
  const getCityName = (search: string, city: string) => {
    let cityTown = search;

    if (search.length > 2 && city === 'city') {
      clearTimeout(timeTyping);
      if (cityTown != '' && prevues != cityTown) {
        timeTyping = window.setTimeout(() => {
          prevues = cityTown;
        }, 500);
      }
    }
  };
  return (
    <DropContainer onClick={(e) => dropRemove(e.target)}>
      <SearchContainer onMouseLeave={(e: React.MouseEvent) => dropLeave(e.target)} className='FP__input__container'>
        <label>{holder}</label>

        <input
          ref={dropclick}
          className='FP__input'
          name={name}
          value={checked}
          type='text'
          onClick={(e: React.MouseEvent<HTMLInputElement>) => dropClicks(e.currentTarget.value)}
          onChange={(e: React.ChangeEvent<HTMLInputElement>) => getCityName(e.target.value, e.target.name)}
          placeholder={label}
        />
        <DropList ref={droplist} onMouseEnter={(e: React.MouseEvent) => dropWait(e.target)} onClick={(e: React.MouseEvent) => dropSelected(e.target)} className={`${name} ${'hide'} ${'dropdownlist'} `}>
          {options}
        </DropList>
      </SearchContainer>
    </DropContainer>
  );
}
const DropContainer = styled.section`
  position: relative;
  width: 100%;
`;
const SearchContainer = styled.section`
  position: relative;
`;

const DropList = styled.div`
  position: absolute;
`;
export default FPSearch;

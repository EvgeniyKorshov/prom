const script = require('../q');
const sum = script.sum;
const vic = script.vic;
const umn = script.umn;
const del = script.del;
  
describe('Функция sum()', () => {
    it('должна возвращать 6 при аргументах (4, 2)', () => {
      expect(sum(4, 2)).toBe(6);
    })
  });

  describe('Функция umn()', () => {
    it('должна возвращать 8 при аргументах (4, 2)', () => {
      expect(umn(4, 2)).toBe(8);
    })
  });

  describe('Функция del()', () => {
    it('должна возвращать 2 при аргументах (4, 2)', () => {
      expect(del(4, 2)).toBe(2);
    })
    it('должна возвращать null при аргументах (null, 2)', () => {
        expect(del(null, 2)).toBeNull();
      })
  });

  describe('Функция vic()', () => {
    it('должна возвращать 2 при аргументах (4, 2)', () => {
      expect(vic(4, 2)).toBe(2);
    })
  });
